整个chapter_4的代码是在chapter_3的基础上修改的，文档结构如下：

chapter_4/
|-- addemail.html      Add Email的Web表单
|-- addemail.php       将客户端传来的表单数据加入邮件列表数据库
|-- readme.txt         说明文档
|-- removeemail.php    删除用户，将removeemail.html和removeemail.php合二为一，并通过列表来勾选
`-- sendemail.php      发送邮件，将sendemail.html和sendemail.php合二为一，同时增加表单验证避免用户发送空标题或空正文的邮件，而且把粘性的表单数据插回到了表单
