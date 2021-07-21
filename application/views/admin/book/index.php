<h2 class="brand-header">書籍購入情報一覧</h2>
<div class="main-wrap">
  <div class="btn-wrapper">
    <?php echo form_open_multipart('book', array('method'=>'POST')); ?>
      <div class="form-group <?php if (form_error('csvfile')): ?>
        has-error
      <?php endif; ?>">
        <input type="file" class="form-control" name="csvfile" value="">
        <span class="help-block"><?php echo form_error('csvfile') ?><?= $successMessage ?></span>
        <button type="submit" class="btn btn-icon"><i class="fa fa-file"></i></button>
      </div>
    </form>
  </div>
  <div class="content-wrapper table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="row">
          <th class="col-xs-1">購入者</th>
          <th class="col-xs-4">書籍タイトル</th>
          <th class="col-xs-2">著者</th>
          <th class="col-xs-2">出版社</th>
          <th class="col-xs-1">価格</th>
          <th class="col-xs-2">購入日</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($books as $book): ?>
          <tr class="row">
            <td class="col-xs-1"><img src="<?php echo $book['avatar'] ?>" alt="" class="avatar-img"></td>
            <td class="col-xs-4"><?php echo $book['title'] ?></td>
            <td class="col-xs-2"><?php echo $book['author'] ?></td>
            <td class="col-xs-2"><?php echo $book['publisher'] ?></td>
            <td class="col-xs-1"><?php echo number_format($book['price']) ?></td>
            <td class="col-xs-2"><?php echo date('Y-m-d', strtotime($book['purchase_date'])) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php echo $pagination; ?>
  </div>
</div>