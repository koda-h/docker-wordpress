<?php

function stk_classic_editor_style($init)
{
    
	$c_editor_style_buttons = array(
		'title' => 'ボタン',
		'items' => array(
			array(
				'title' => 'デフォルトボタン',
				'block' => 'div',
				'selector' => 'a',
				'classes' => 'btn-wrap default',
			),
			array(
				'title' => 'シンプル',
				'block' => 'div',
				'selector' => 'a',
				'classes' => 'btn-wrap simple',
			),
			array(
				'title' => 'リッチイエロー',
				'block' => 'div',
				'selector' => 'a',
				'classes' => 'btn-wrap rich_yellow',
			),
			array(
				'title' => 'リッチピンク',
				'block' => 'div',
				'selector' => 'a',
				'classes' => 'btn-wrap rich_pink',
			),
			array(
				'title' => 'リッチオレンジ',
				'block' => 'div',
				'selector' => 'a',
				'classes' => 'btn-wrap rich_orange',
			),
			array(
				'title' => 'リッチグリーン',
				'block' => 'div',
				'selector' => 'a',
				'classes' => 'btn-wrap rich_green',
			),
			array(
				'title' => 'リッチブルー',
				'block' => 'div',
				'selector' => 'a',
				'classes' => 'btn-wrap rich_blue',
			),
		)
	);


	$c_editor_style_maker_blue = array(
		'title' => 'マーカー（ブルー）',
		'inline' => 'span',
		'classes' => 'span__stk_maker_blue',
	);
	$c_editor_style_maker_yellow = array(
		'title' => 'マーカー（イエロー）',
		'inline' => 'span',
		'classes' => 'span__stk_maker_yellow',
	);
	$c_editor_style_maker_pink = array(
		'title' => 'マーカー（ピンク）',
		'inline' => 'span',
		'classes' => 'span__stk_maker_pink',
	);

  
  $c_editor_style_index = array(
    $c_editor_style_buttons,
    $c_editor_style_maker_blue,
    $c_editor_style_maker_yellow,
    $c_editor_style_maker_pink,
  );

  $init['style_formats'] = json_encode($c_editor_style_index);
  return $init;
}
add_filter('tiny_mce_before_init', 'stk_classic_editor_style');


function add_stk_btn_style($buttons) {
  array_splice($buttons, 1, 0, 'styleselect');
  return $buttons;
}
add_filter('mce_buttons', 'add_stk_btn_style');
