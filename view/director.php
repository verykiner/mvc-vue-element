<div class="clearfix">
    <el-button type="" class="l" @click="open_dialog">新增导演</el-button>
    <!--搜索-->
    <form class="filter r" style="margin-bottom:10px">
        <el-input name="key" v-model="key" placeholder="请输入内容" class="input-with-select">
            <!-- 由于element-ui 中的 select 表单提交的值是选项的label值，因此表单提交只能通过js来控制 -->
            <el-select v-model="type" slot="prepend" placeholder="请选择">
                <el-option label="姓名" value="1"></el-option>
                <el-option label="手机号" value="2"></el-option>
                <el-option label="国家" value="3"></el-option>
            </el-select>
            <el-button slot="append" icon="el-icon-search" @click="search"></el-button>
        </el-input>
    </form>
</div>

<el-table border stripe :data="tableData">
    <el-table-column prop="id" label="ID"></el-table-column>
    <el-table-column prop="name" label="姓名"></el-table-column>
    <el-table-column prop="phone" label="手机号"></el-table-column>
    <el-table-column prop="country" label="国家"></el-table-column>
    <el-table-column prop="add_time" label="添加时间"></el-table-column>
    <el-table-column fixed="right" label="操作" width="120">
        <template slot-scope="scope">
            <el-button type="text" size="small" @click="open_dialog(scope.row)">修改</el-button>
            <el-button type="text" size="small" @click="del(scope.row)">删除</el-button>
        </template>
    </el-table-column>
</el-table>
<div class="block">
    <el-pagination layout="prev, pager, next" :total="total" :current-page="page" @current-change="gopage" ></el-pagination>
</div>
<!--新增/修改模板-->
<el-dialog title="操作" :visible="dialog" @close="dialog = false">
    <el-form ref="form" :model="form" :rules="rules" label-width="100px" >
        <el-form-item label="姓名" prop="name">
            <el-input v-model="form.name"></el-input>
        </el-form-item>
        <el-form-item label="手机号" prop="phone">
            <el-input v-model="form.phone"></el-input>
        </el-form-item>
        <el-form-item label="国家">
            <el-input v-model="form.country"></el-input>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" @click="submit">确定</el-button>
            <el-button @click="dialog = false">取消</el-button>
        </el-form-item>
    </el-form>
</el-dialog>

</el-main>
</el-container>
</div>

<script src="static/js/director.js"></script>
