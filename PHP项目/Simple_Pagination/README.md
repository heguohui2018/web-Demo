# 一个简单的 php 分页程序

## 处理步骤

## 工程目录

```
.
├── README.md  项目概况
├── db.php  数据库配置项
├── index.php  主页
└── pagination.php  分页处理逻辑

```

## 理解要点

`$GET` 数组中传递的是通过 url 传递的值，`page` 是数组的下标

例如： `http://www.xx.cn/index.php?id=1&page=5`

那么传递过来的`$_GET` 数组中

`$_GET['id']=1`

`$_GET['page']=5`
