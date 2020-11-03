目录说明
- config.php 全局配置项

- index.php 入口页

- dispatch.php 路由分配器

- controller 控制器层

- view  视图层
  - include 
    - header.php 公共头部
    - footer.php 公共底部
  
待优化
1. 添加命名空间
2. 数据库查询类创建
3. 结构优化
4. vue+element
5. 异常类优化

1028 
1. 总体结构修改，使用类包裹函数，添加 Model 层， 经考虑后，决定不做单独表映射，直接用全局数据操作方法
2. 添加自动加载类机制
3. 添加对应 controller 类

11.1
1. vue 初步整合
2. elementUI 前端框架初步整合
3. 框架优化

11.2
1. 首页优化
TODO
1. 数据排序
2. 搜索
3. 弹窗关闭为何执行提交事件
4. 分页
5. 表单验证

11.3
1. 搜索 done
2. 排序 done 后期再进一步优化
3. 弹窗数据问题：vue 数据未解绑问题 done
4. 分页 done
5. 表单验证 done
6. 代码优化 done
7. 数据重设 