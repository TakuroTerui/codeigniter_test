<h2 class="brand-header">質問一覧</h2>
<div class="main-wrap">
  <form id="question-search-form">
    <div class="btn-wrapper">
      <div class="search-box">
        <input class="form-control search-form" placeholder="Search words..." name="search_word" type="text">
        <button type="submit" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></button>
      </div>
      <a class="btn" href=""><i class="fa fa-plus" aria-hidden="true"></i></a>
      <a class="btn" href="">
        <i class="fa fa-user" aria-hidden="true"></i>
      </a>
    </div>
    <div class="category-wrap">
      <div class="btn all" id="0">all</div>
      <?php foreach ($categories as $category): ?>
          <div class="btn" id="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></div>
      <?php endforeach; ?>
      <input id="category-val" name="tag_category_id" type="hidden" value="">
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
          <td class="col-xs-2"><?php echo $question['name'] ?></td>
          <td class="col-xs-6"><?php echo $question['title'] ?></td>
          <td class="col-xs-1"><span class="point-color"></span></td>
          <td class="col-xs-2">
            <a class="btn btn-success" href="">
              <i class="fa fa-comments-o" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div aria-label="Page navigation example" class="text-center"></div>
  </div>
</div>