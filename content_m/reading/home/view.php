<?php
namespace content_m\reading\home;


class view
{
	public static function config()
	{

		\dash\data::page_title(T_("Audio list"));
		\dash\data::page_desc(T_('Check list and search or filter them.'). ' '. T_('Also add or edit specefic item.'));

		\dash\data::page_pictogram('coffee');

		\dash\data::badge_link(\dash\url::here());
		\dash\data::badge_text(T_('Back to dashboard'));

		$search_string            = \dash\request::get('q');
		if($search_string)
		{
			\dash\data::page_title(\dash\data::page_title(). ' | '. T_('Search for :search', ['search' => $search_string]));
		}

		$args =
		[
			'sort'  => \dash\request::get('sort'),
			'order' => \dash\request::get('order'),
		];

		if(!$args['order'])
		{
			$args['order'] = 'DESC';
		}


		if(!$args['sort'])
		{
			$args['sort'] = 'id';
		}

		if(\dash\request::get('status'))
		{
			$args['status'] = \dash\request::get('status');
		}

		if(\dash\request::get('type'))
		{
			$args['type'] = \dash\request::get('type');
		}

		if(\dash\request::get('gender'))
		{
			$args['gender'] = \dash\request::get('gender');
		}

		if(\dash\request::get('position'))
		{
			$args['position'] = \dash\request::get('position');
		}

		if(\dash\request::get('capacity'))
		{
			$args['capacity'] = \dash\request::get('capacity');
		}

		$sortLink  = \dash\app\sort::make_sortLink(\lib\app\lm_audio::$sort_field, \dash\url::this());
		$dataTable = \lib\app\lm_audio::list(\dash\request::get('q'), $args);

		\dash\data::sortLink($sortLink);
		\dash\data::dataTable($dataTable);

		$check_empty_datatable = $args;
		unset($check_empty_datatable['sort']);
		unset($check_empty_datatable['order']);

		// set dataFilter
		$dataFilter = \dash\app\sort::createFilterMsg($search_string, $check_empty_datatable);
		\dash\data::dataFilter($dataFilter);



	}
}
?>