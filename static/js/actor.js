/*
* 演员管理
* author: zmx
* date: 2020.11.1
* */

let vm = new Vue({
        el: '#app',
        data: {
            tableData: [], // 表格数据
            total: 0, // 总数
            page: 1, // 当前页码，从1开始
            pageSize: 10, // 每页数据量
            dialog: false, // 操作弹窗
            mode: 0, // 当前弹窗模式：1：修改 0：添加
            type: '1', // 删选条件 1/2/3：姓名/手机号/国家
            key: '', // 搜索值
            form: {
                id: '',
                name: '',
                age: '',
                sex: 1,
                phone: '',
                country: ''
            },
            rules: {
                name: [
                    {required: true, message: '姓名不能为空', trigger: 'blur'},
                ],
                phone: [
                    {required: true, message: '手机号不能为空', trigger: 'blur'},
                ],
                age: [
                    {required: true, message: '年龄不能为空', trigger: 'blur'},
                ],
                sex: [
                    {required: true, message: '性别不能为空', trigger: 'blur'},
                ],
            }
        },
        methods: {
            /*
            *  性别格式化
            *  @param row 行数据对象
            */
            sexformatter(row) {
                return row.sex == 1 ? '男' : '女';
            },
            /*
            *  打开添加/修改弹窗
            *  @param row 行数据对象
            */
            open_dialog(row) {
                if (row.id) {
                    this.mode = 1;
                    (this.form) = JSON.parse(JSON.stringify(row));  // 解构赋值，这里主要要给数据解绑
                } else {
                    this.mode = 0;
                }
                this.dialog = true;
            },
            // 提交
            submit() {
                this.$refs['form'].validate((valid) => {
                    if (valid) {
                        this.mode ? this.update() : this.add();
                    } else {
                        return;
                    }
                });
            },
            // 取消
            cancel() {
                this.dialog = false;
            },
            /*
            * 分页点击
            * @param current 当前页码
            * */
            gopage(current) {
                this.page = current;
                this.getData();
            },
            // 搜索
            search() {
                this.page = 1;
                this.getData();
            },
            // 获取数据
            getData() {
                var _this = this;
                $.ajax({
                    type: "post",
                    url: "/controller/actorController.php?m=actor&c=select",
                    dataType: "json",
                    data: {
                        type: _this.type,
                        key: _this.key,
                        page: _this.page,
                        pageSize: _this.pageSize
                    },
                    success: function (data) {
                        if (data.code) {
                            _this.tableData = data.data;
                            _this.total = data.total;
                        } else {
                            _this.$message({
                                message: '数据查询失败，管理员在睡午觉！！！',
                                type: 'error',
                            });
                        }
                    },
                    error: function () {
                        _this.$message({
                            message: '数据查询失败，请不要联系管理员！！！',
                            type: 'error',
                        });
                    }
                })
            },
            // 添加
            add() {
                var _this = this;
                $.ajax({
                    type: "post",
                    url: "/controller/actorController.php?m=actor&c=add",
                    dataType: "json",
                    data: _this.form,
                    success: function (data) {
                        if (data.text) {
                            _this.$message({
                                message: '添加成功',
                                type: 'success',
                                duration: '1000',
                                onClose: () => {
                                    _this.dialog = false;
                                    _this.getData();
                                }
                            });
                        } else {
                            _this.$message({
                                message: '添加失败，请联系管理员！！！',
                                type: 'error',
                            });
                        }
                    },
                    error: function () {
                        _this.$message({
                            message: '添加失败，你换个姿势试试呢！！！',
                            type: 'error',
                        });
                    }
                })
            },
            // 修改
            update() {
                var _this = this;
                $.ajax({
                    type: "post",
                    url: "/controller/actorController.php?m=actor&c=update",
                    dataType: "json",
                    data: _this.form,
                    success: function (data) {
                        if (data.code) {
                            _this.$message({
                                message: '更新成功',
                                type: 'success',
                                duration: '1000',
                                onClose: () => {
                                    _this.dialog = false;
                                    _this.getData();
                                }
                            });
                        } else {
                            _this.$message({
                                message: '修改失败，请联系管理员！！！',
                                type: 'error',
                            });
                        }
                    },
                    error: function () {
                        _this.$message({
                            message: '修改失败，请重试！！！',
                            type: 'error',
                        });
                    }
                })
            },
            /*
            * 删除
            * @param row 行数据对象
            */
            del(row) {
                var _this = this;
                (_this.form) = row;  // 解构赋值
                $.ajax({
                    type: "post",
                    url: "/controller/actorController.php?m=actor&c=delete",
                    dataType: "json",
                    data: {
                        id: _this.form.id
                    },
                    success: function (data) {
                        if (data.code) {
                            _this.$message({
                                message: '删除成功！！！',
                                type: 'success',
                                duration: 500,
                                onClose: () => {
                                    _this.getData();
                                }
                            });
                        } else {
                            _this.$message({
                                message: '删除失败，请联系管理员！！！',
                                type: 'error',
                            });
                        }

                    },
                    error: function () {
                        _this.$message({
                            message: '删除失败了，问题出在哪里自己想！！！',
                            type: 'error',
                        });
                    }
                })
            },
        },
        created: function () {
        },
        mounted: function () {
            this.getData();
        }
    })
;