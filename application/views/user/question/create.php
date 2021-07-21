<h2 class="brand-header">質問投稿</h2>
<div class="main-wrap">
  <div class="container">
    <?php echo form_open('question/create', array('method'=>'POST')); ?>
      <div class="form-group <?php if (form_error('tag_category_id')): ?>
        has-error
      <?php endif; ?>">
        <div class="form-group form-inline">
          <?php foreach ($categories as $category): ?>
            <label class="checkbox-inline">
              <?php echo form_input(array('name' => 'tag_category_id[]', 'type' => 'checkbox', 'value' => $category['id'])); ?>
              <?php echo $category['name'] ?>
            </label>
          <?php endforeach; ?>
        </div>
        <div class="has-error">
          <span class="help-block"><?php echo form_error('tag_category_id'); ?></span>
        </div>
      </div>
      <div class="form-group <?php if (form_error('title')): ?>
        has-error
      <?php endif; ?>">
        <?php echo form_input(array('name' => 'title', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'title')); ?>
        <span class="help-block"><?php echo form_error('title'); ?></span>
      </div>
      <div class="form-group <?php if (form_error('content')): ?>
        has-error
      <?php endif; ?>">
        <?php echo form_textarea(array('name' => 'content',  'class' => 'form-control', 'placeholder' => 'Please write down your question here...', 'cols' => '50', 'rows' => '10')); ?>
        <span class="help-block"><?php echo form_error('content'); ?></span>
      </div>
      <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-success pull-right', 'content' => "CREATE", 'name' => 'confirm', 'value' => 'create')) ?>
    </form>
  </div>
</div>