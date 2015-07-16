<form class="form-plugin" action="<?php echo $config->url_current; ?>/update" method="post">
  <?php echo Form::hidden('token', $token); ?>
  <?php $ace_speak = Mecha::A($speak->plugin_ace); ?>
  <?php $ace_config = File::open(PLUGIN . DS . File::B(__DIR__) . DS . 'states' . DS . 'config.txt')->unserialize(); ?>
  <?php $ace_config_default = include PLUGIN . DS . File::B(__DIR__) . DS . 'states' . DS . 'repair.state.config.php'; ?>
  <label class="grid-group">
    <span class="grid span-1 form-label"><?php echo $ace_speak[0]; ?></span>
    <span class="grid span-5"><?php echo Form::select('theme', Mecha::eat($ace_config_default['theme'])->order('ASC')->vomit(), $ace_config['theme']); ?></span>
  </label>
  <label class="grid-group">
    <span class="grid span-1 form-label"><?php echo $ace_speak[1]; ?></span>
    <span class="grid span-5"><?php echo Form::select('tab_size', array(
        'size_2' => '2',
        'size_4' => '4'
    ), 'size_' . $ace_config['tab_size']); ?></span>
  </label>
  <div class="grid-group">
    <span class="grid span-1"></span>
    <div class="grid span-5">
    <?php

    $states = array(
        'use_wrap_mode' => $ace_speak[2][0],
        'highlight_active_line' => $ace_speak[2][1],
        'show_gutter' => $ace_speak[2][2],
        'show_fold_widget' => $ace_speak[2][3],
        'show_indent_guide' => $ace_speak[2][4],
        'show_invisible' => $ace_speak[2][5]
    );

    foreach($states as $k => $v) {
        echo '<div>' . Form::checkbox('state[' . $k . ']', 1, $ace_config['state'][$k], $v) . '</div>';
    }

    ?>
    </div>
  </div>
  <div class="grid-group">
    <span class="grid span-1"></span>
    <span class="grid span-5"><?php echo Jot::button('action', $speak->update); ?></span>
  </div>
</form>