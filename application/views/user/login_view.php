<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>サインイン</title>
  </head>
  <body>
         <?php echo form_open('login/auth');?>
          <h2>ようこそ。</h2>
          <?php echo $this->session->flashdata('msg');?>
            <input type="email" name="email" placeholder="メールアドレス" required autofocus>
          <input type="password" name="password" placeholder="パスワード" required>
          <button type="submit">サインイン</button>
         <?php echo form_close();?>
  </body>
</html>