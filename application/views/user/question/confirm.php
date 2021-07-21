<h2 class="brand-header">投稿内容確認</h2>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
      <?php echo $user['name'] ?>の質問
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text"><?php echo $input['title'] ?></td>
          </tr>
          <tr>
            <th class="table-column">Question</th>
            <td class='td-text'><?php echo $input['content'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="btn-bottom-wrapper">
    <?php if ($input['confirm'] === 'create'): ?>
      <?php echo form_open('question/store', array('method'=>'POST')); ?>
    <?php else: ?>
      <?php echo form_open('question/' . $question['question_pk'] . '/update', array('method'=>'POST')); ?>
    <?php endif; ?>
      <?php foreach ($input['tag_category_id'] as $categoryId): ?>
        <input name="tag_category_id[]" type="hidden" value="<?php echo $categoryId ?>">
      <?php endforeach; ?>
      <input name="title" type="hidden" value="<?php echo $input['title'] ?>">
      <input name="content" type="hidden" value="<?php echo $input['content'] ?>">
      <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-success', 'content' => '<i class="fa fa-check" aria-hidden="true"></i>')) ?>
    </form>
  </div>
</div>