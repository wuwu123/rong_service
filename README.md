## 融云消息

### 配置文件

```php
<?php
$config =  new Config($appKey,$appSecret);

//设置自定义的Client
$model->setClientClass(function(array $config) {
        return new Client($config);
    });
```

### 聊天室内容

文件地址`Lib/Chatroom`

```php
<?php
$roomId = "1234qwe";
$roomName = "测试";


$roomModel = new Chatroom($config);
$data = $roomModel->create($roomId, $roomName);
```

#### 聊天室回调消息结构体

```
lib/Obj/ChatroomObj.php
```

### 私人消息

文件地址`Lib/Message`

```php
<?php
$person = new Person($config);
$message = new TxtMsg();
$message->setContent('我是测试');
$sendUser = UserObject::make(123, '测试', '');
$data = $person->send(123, 456, $message, $sendUser);
```
