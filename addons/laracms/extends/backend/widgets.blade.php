{{ Widget::show(Lang::get('laracms::strings.lara_news'),feedToList(Feedreader::read('http://feeds.feedburner.com/simplepie'))) }}
{{ Widget::show(Lang::get('laracms::strings.pages'),pagesToList(Pages::paginate(10))) }}
