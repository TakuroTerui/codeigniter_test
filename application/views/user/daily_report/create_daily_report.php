<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    <?php echo form_open('report/create', array('method'=>'POST')); ?>
      <div class="form-group form-size-small <?php if (form_error('date')): ?>
        has-error
      <?php endif; ?>">
      <!-- <div class="form-group form-size-small has-error"> -->
        <?php echo form_input(array('name' => 'date', 'type' => 'date', 'class' => 'form-control')) ?>
        <span class="help-block"><?php echo form_error('date'); ?></span>
      </div>
      <div class="form-group <?php if (form_error('date')): ?>
        has-error
      <?php endif; ?>">
      <!-- <div class="form-group has-error"> -->
        <?php echo form_input(array('name' => 'title', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Title')) ?>
        <span class="help-block"><?php echo form_error('title'); ?></span>
      </div>
      <div class="form-group <?php if (form_error('date')): ?>
        has-error
      <?php endif; ?>">
      <!-- <div class="form-group has-error"> -->
        <?php echo form_textarea(array('name' => 'content', 'class' => 'form-control', 'placeholder' => 'Content', 'cols' => 50, 'rows' => 10)) ?>
        <span class="help-block"><?php echo form_error('content'); ?></span>
      </div>
      <?php echo form_input(array('name' => 'submit', 'type' => 'submit', 'class' => 'btn btn-success pull-right', 'value' => 'Add')) ?>
    </form>
  </div>
</div>
