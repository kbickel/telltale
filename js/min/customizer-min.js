!function($){wp.customize("blogname",function(t){t.bind(function(t){$(".site-title a").text(t)})}),wp.customize("blogdescription",function(t){t.bind(function(t){$(".site-description").text(t)})}),wp.customize("header_textcolor",function(t){t.bind(function(t){"blank"===t?$(".site-title a, .site-description").css({clip:"rect(1px, 1px, 1px, 1px)",position:"absolute"}):($(".site-title a, .site-description").css({clip:"auto",position:"relative"}),$(".site-title a, .site-description").css({color:t}))})}),wp.customize("menu_textcolor",function(t){t.bind(function(t){"blank"===t?$(".main-navigation a").css({clip:"rect(1px, 1px, 1px, 1px)",position:"absolute"}):($(".main-navigation a").css({clip:"auto",position:"relative"}),$(".main-navigation a").css({color:t}))})}),wp.customize("header_background",function(t){t.bind(function(t){$("#masthead, #masthead #search, #masthead #search .search-field, .bottom-header").css({background:t})})}),wp.customize("header_border",function(t){t.bind(function(t){$("#masthead, .bottom-header").css({"border-color":t})})}),wp.customize("heading",function(t){t.bind(function(t){$(".no-image .entry-title, .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5").css({color:t})})}),wp.customize("accent",function(t){t.bind(function(t){$("blockquote, table tfoot").css({"border-color":t}),$(".entry-meta .fa, .entry-footer .fa, input.submit, blockquote p:before, blockquote p:after").css({color:t})})}),wp.customize("custom_css",function(t){t.bind(function(t){$(".custom-css").html(t)})})}(jQuery);