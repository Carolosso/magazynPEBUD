@extends(backpack_view('layouts.' . (backpack_theme_config('layout') ?? 'vertical')))

@php
use App\Models\MaterialyDrogowe;
use App\Models\MaterialyDoBudowyDomow;
use App\Models\MaterialyKanalizacyjne;
use App\Models\MaterialyWodociagowe;
use App\Models\Narzedzia;
use App\Models\Sprzet;

//use Backpack\CRUD\app\Library\Auth\backpack_auth;

	// Merge widgets that were fluently declared with widgets declared without the fluent syntax:
	// - $data['widgets']['before_content']
	// - $data['widgets']['after_content']
	/* if (isset($widgets)) {
		foreach ($widgets as $section => $widgetSection) {
			foreach ($widgetSection as $key => $widget) {
				\Backpack\CRUD\app\Library\Widget::add($widget)->section($section);
			}
		}
	} */
	Widget::add([
    'type'        => 'jumbotron',
    'heading'     => 'Witaj ' .backpack_auth()->user()->name. '!',
    'heading_class' => 'display-4',
	]);

	Widget::add([
		'type' => 'div',
		'class' => 'row',
		'content' => [
				[
					'type' => 'custom_card_ribbon_widget',
					'title' => 'Materiały do budowy domów',
					'icon_class' => 'la la-home',
					'bg_class' => 'bg-primary',
					'value' => MaterialyDoBudowyDomow::count(),
					'link' => backpack_url('materialy-do-budowy-domow')
				],
				[
					'type' => 'custom_card_ribbon_widget',
					'title' => 'Materiały drogowe',
					'icon_class' => 'la la-road',
					'bg_class' => 'bg-secondary',
					'value' => MaterialyDrogowe::count(),
					'link' => backpack_url('materialy-drogowe')
				],
				[
					'type' => 'custom_card_ribbon_widget',
					'title' => 'Materiały kanalizacyjne',
					'icon_class' => 'la la-recycle',
					'bg_class' => 'bg-info',
					'value' => MaterialyKanalizacyjne::count(),
					'link' => backpack_url('materialy-kanalizacyjne')
				],
				[
					'type' => 'custom_card_ribbon_widget',
					'title' => 'Materiały wodociągowe',
					'icon_class' => 'la la-tint',
					'bg_class' => 'bg-danger',
					'value' => MaterialyWodociagowe::count(),
					'link' => backpack_url('materialy-wodociagowe')
				],
				[
					'type' => 'custom_card_ribbon_widget',
					'title' => 'Narzędzia',
					'icon_class' => 'la la-tools',
					'bg_class' => 'bg-success',
					'value' => Narzedzia::count(),
					'link' => backpack_url('narzedzia')
				],
				[
					'type' => 'custom_card_ribbon_widget',
					'title' => 'Sprzęt',
					'icon_class' => 'la la-truck',
					'bg_class' => 'bg-warning',
					'value' => Sprzet::count(),
					'link' => backpack_url('sprzet')
				],
		]
	]);

@endphp

@section('before_breadcrumbs_widgets')
	@include(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('section', 'before_breadcrumbs')->toArray() ])
@endsection

@section('after_breadcrumbs_widgets')
	@include(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('section', 'after_breadcrumbs')->toArray() ])
@endsection

@section('before_content_widgets')
	@include(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('section', 'before_content')->toArray() ])
@endsection

@section('content')



@endsection

@section('after_content_widgets')
	@include(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('section', 'after_content')->toArray() ])
@endsection