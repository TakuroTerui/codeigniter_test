<h2 class="brand-header">質問一覧</h2>
<div class="main-wrap">
  <?php echo form_open('question', array('id'=>'question-search-form', 'method'=>'GET')); ?>
    <div class="btn-wrapper">
      <div class="search-box">
        <?php echo form_input(array('type' => 'text', 'class' => 'form-control search-form', 'name' => 'search_word', 'placeholder' => 'Search words...')) ?>
        <?php echo form_button(array('type' => 'submit', 'class' => 'search-icon', 'content' => '<i class="fa fa-search" aria-hidden="true"></i>')) ?>
      </div>
      <a class="btn" href="<?php echo site_url('question/create'); ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
      <a class="btn" href="<?php echo site_url('question/mypage'); ?>">
        <i class="fa fa-user" aria-hidden="true"></i>
      </a>
    </div>
    <div class="category-wrap">
      <div class="btn all" id="0">all</div>
      <?php foreach ($categories as $category): ?>
          <div class="btn" id="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></div>
      <?php endforeach; ?>
      <?php echo form_input(array('name' => 'tag_category_id', 'id' => 'category-val', 'type' => 'hidden')); ?>
    </div>
  </form>
  <div class="content-wrapper table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="row">
          <th class="col-xs-1">user</th>
          <th class="col-xs-2">category</th>
          <th class="col-xs-6">title</th>
          <th class="col-xs-1">comments</th>
          <th class="col-xs-2"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($questions as $question): ?>
        <tr class="row">
          <td class="col-xs-1"><img src="<?php echo $question['avatar'] ?>" class="avatar-img"></td>
          <td class="col-xs-2"><?php echo str_replace(',', ' ', $question['categories_name']) ?></td>
          <td class="col-xs-6"><?php echo mb_strimwidth($question['title'], 0, 30, '...') ?></td>
          <td class="col-xs-1"><span class="point-color"><?php echo $question['cnt'] ?></span></td>
          <td class="col-xs-2">
            <a class="btn btn-success" href="<?php echo site_url('question/' . $question['question_pk']); ?>">
              <i class="fa fa-comments-o" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div aria-label="Page navigation example" class="text-center">
      <?php echo $pagination; ?>
    </div>
  </div>
</div>