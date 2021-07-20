<h1 class="brand-header">質問詳細</h1>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
      <img src="<?php echo $question['avatar'] ?>" class="avatar-img">
      <p>&nbsp;<?php echo $question['name'] ?>さんの質問&nbsp;&nbsp;(&nbsp; <?php echo str_replace(',', ' ', $question['categories_name']) ?> &nbsp;)</p>
      <p class="question-date"><?php echo date('Y-m-d H:i', strtotime($question['created_at'])) ?></p>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text"><?php echo $question['title'] ?></td>
          </tr>
          <tr>
            <th class="table-column">Question</th>
            <td class='td-text'><?php echo $question['content'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
    <div class="comment-list">
      <?php foreach ($comments as $comment): ?>
        <div class="comment-wrap">
          <div class="comment-title">
            <img src="<?php echo $comment['avatar'] ?>" class="avatar-img">
            <p><?php echo $question['name'] ?></p>
            <p class="comment-date"><?php echo date('Y-m-d H:i', strtotime($comment['created_at'])) ?></p>
          </div>
          <div class="comment-body"><?php echo $comment['content'] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  <div class="comment-box">
    <?php echo form_open('question/' . $question['question_pk'], array('method'=>'POST')); ?>
      <?php echo form_input(array('name' => 'question_id', 'type' => 'hidden', 'value' => $question['question_pk'])); ?>
      <div class="comment-title">
        <img src="" class="avatar-img"><p>コメントを投稿する</p>
      </div>
      <div class="comment-body <?php if (form_error('comment')): ?>
        has-error
      <?php endif; ?>">
        <?php echo form_textarea(array('name' => 'comment',  'class' => 'form-control', 'placeholder' => 'Add your comment...', 'cols' => '50', 'rows' => '10')); ?>
        <span class="help-block"><?php echo form_error('comment'); ?></span>
      </div>
      <div class="comment-bottom">
        <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-success', 'content' => "<i class='fa fa-pencil' aria-hidden='true'></i>")) ?>
      </div>
    </form>
  </div>
</div>