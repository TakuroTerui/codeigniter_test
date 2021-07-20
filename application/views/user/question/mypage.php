<h2 class="brand-header">
  <img src="" class="avatar-img">&nbsp;&nbsp;My page
</h2>
<div class="main-wrap">
  <div class="content-wrapper table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="row">
          <th class="col-xs-2">date</th>
          <th class="col-xs-1">category</th>
          <th class="col-xs-5">title</th>
          <th class="col-xs-2">comments</th>
          <th class="col-xs-1"></th>
          <th class="col-xs-1"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($questions as $question): ?>
        <tr class="row">
          <td class="col-xs-2"><?php echo date('Y-m-d', strtotime($question['created_at'])) ?></td>
          <td class="col-xs-1"><?php echo str_replace(',', ' ', $question['categories_name']) ?></td>
          <td class="col-xs-5"><?php echo $question['title'] ?></td>
          <td class="col-xs-2"><span class="point-color"><?php echo $question['cnt'] ?></span></td>
          <td class="col-xs-1">
            <a class="btn btn-success" href="<?php echo site_url('question/' . $question['question_pk'] . '/edit'); ?>">
              <i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
          </td>
          <td class="col-xs-1">
            <?php echo form_open('question/delete/' . $question['question_pk']); ?>
              <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-danger', 'content' => '<i class="fa fa-trash-o" aria-hidden="true"></i>')) ?>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>