
### 利用PHP+VUE+Element-UI，基于 MVC 模式建造一个简单的列表查询项目。

目录说明
- config.php 全局配置项

- index.php 入口页

- dispatch.php 自动加载模板 （后期会优化为路由分配）

- controller 控制器层
  - actorController.php 演员控制器
  - directorController.php 演员控制器

- model 模型层 （未使用表映射，后期看情况添加）
  - DB.php 数据库调用类
  - Query.php 数据库操作类
  
- view  视图层
  - include 
    - header.php 公共头部
    - footer.php 公共底部
  actor.php 演员页
  director.php 导演页
  
 - static 静态资源目录（css、js、img、font）
 - database 数据库文件存放目录
 

10.26待优化
1. 添加命名空间
2. 数据库查询类创建
3. 结构优化
4. vue+element
5. 异常类优化

10.28 
1. 总体结构修改，使用类包裹函数，添加 Model 层， 经考虑后，决定不做单独表映射，直接用全局数据操作方法
2. 添加自动加载类机制
3. 添加对应 controller 类

11.01
1. vue 初步整合
2. elementUI 前端框架初步整合
3. 框架优化

11.02
1. 首页优化
TODO
1. 数据排序
2. 搜索
3. 弹窗关闭为何执行提交事件
4. 分页
5. 表单验证

11.03
1. 搜索 done
2. 排序 done 后期再进一步优化
3. 弹窗数据问题：vue 数据未解绑问题 done
4. 分页 done
5. 表单验证 done
6. 代码优化 done
7. 数据重设 done

TODO（待办）
1. 控制器，视图，模型建立抽象类
2. 重复函数封装
3. 路由添加
4. 登录退出