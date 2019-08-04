<?php
namespace content_a\khatm\usage;


class view
{
	public static function config()
	{
		\dash\data::page_title(T_("khatm usage"));
		\dash\data::page_desc(' ');
		\dash\data::page_pictogram('bookmark-o');

		\dash\data::badge_link(\dash\url::this());

		\dash\data::badge_text(T_('Back to dashboard'));

		$khatm = \lib\app\khatm::get(\dash\url::subchild());
		\dash\data::khatmRow($khatm);
	}
}
?>