<h1 class="brand-header">質問編集</h1>

<div class="main-wrap">
  <div class="container">
    <?php echo form_open('question/' . $question['id'] . '/edit', array('method'=>'POST')); ?>
      <div class="form-group <?php if (form_error('tag_category_id')): ?>
        has-error
      <?php endif; ?>">
        <div class="form-group form-inline">
          <?php foreach ($categories as $category): ?>
          <label class="checkbox-inline">
            <input type="checkbox" name="tag_category_id[]" value="<?php echo $category['id'] ?>" <?php if (in_array($category['name'], $question['categories_name'])): ?>
            checked="true
            <?php endif; ?>">
            <?php echo $category['name'] ?>
          </label>
          <?php endforeach; ?>
        </div>
        <div>
          <span class="help-block"><?php echo form_error('tag_category_id'); ?></span>
        </div>
      </div>
      <div class="form-group <?php if (form_error('title')): ?>
        has-error
      <?php endif; ?>">
        <?php echo form_input(array('name' => 'title', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'title', 'value' => $question['title'])); ?>
        <span class="help-block"><?php echo form_error('title'); ?></span>
      </div>
      <div class="form-group <?php if (form_error('content')): ?>
        has-error
      <?php endif; ?>">
        <?php echo form_textarea(array('name' => 'content',  'class' => 'form-control', 'placeholder' => 'Please write down your question here...', 'cols' => '50', 'rows' => '10', 'value' => $question['content'])); ?>
        <span class="help-block"><?php echo form_error('content'); ?></span>
      </div>
      <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-success pull-right', 'content' => "UPDATE", 'name' => 'confirm', 'value' => 'update')) ?>
    </form>
  </div>
</div>