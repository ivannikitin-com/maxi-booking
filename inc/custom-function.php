<?php

add_filter( 'upload_mimes', 'upload_allow_types' );

function upload_allow_types( $mimes ) {
    // разрешаем новые типы
    // https://wp-kama.ru/id_8643/spisok-rasshirenij-fajlov-i-ih-mime-tipov.html
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}