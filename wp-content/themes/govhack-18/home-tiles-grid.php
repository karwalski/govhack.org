<?php
/**
 * THE HOMEPAGE GRID TILE SECTION
 * Renders grid
 */

/** Get the Tile grid **/
global $post;
$tiles_query_posts_per_row = get_theme_mod('gh_tile_columns', 3);

// Only include where taxonomy=tiles_category, term=homepage
$tiles_query_args = [
    'post_type' => 'tiles',
    'post_status' => ['publish'],
    'posts_per_page' => 999,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'tax_query'=> [
        [ 'taxonomy' => 'tiles_category', 'field' => 'slug', 'terms' => 'homepage' ]
    ]
];

// We are using query_posts BECAUSE we use this to drive a downstream template
// ( in this case, it's hardcoded as ('content', 'tiles') )
// and query_posts is a good way of altering the main loop to allow us to do so.
query_posts($tiles_query_args);
set_query_var('tiles_per_row', $tiles_query_posts_per_row);
get_template_part( 'content', 'tiles' );
wp_reset_query();

?>

<script>
    !function(a,t){"function"==typeof define&&define.amd?define(t):"object"==typeof exports?module.exports=t(require,exports,module):a.CountUp=t()}(this,function(a,t,e){var n=function(a,t,e,n,i,r){function o(a){a=a.toFixed(c.decimals),a+="";var t,e,n,i;if(t=a.split("."),e=t[0],n=t.length>1?c.options.decimal+t[1]:"",i=/(\d+)(\d{3})/,c.options.useGrouping)for(;i.test(e);)e=e.replace(i,"$1"+c.options.separator+"$2");return c.options.prefix+e+n+c.options.suffix}function l(a,t,e,n){return e*(-Math.pow(2,-10*a/n)+1)*1024/1023+t}function s(a){return"number"==typeof a&&!isNaN(a)}for(var u=0,m=["webkit","moz","ms","o"],d=0;d<m.length&&!window.requestAnimationFrame;++d)window.requestAnimationFrame=window[m[d]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[m[d]+"CancelAnimationFrame"]||window[m[d]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(a,t){var e=(new Date).getTime(),n=Math.max(0,16-(e-u)),i=window.setTimeout(function(){a(e+n)},n);return u=e+n,i}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(a){clearTimeout(a)});var c=this;if(c.version=function(){return"1.8.5"},c.options={useEasing:!0,useGrouping:!0,separator:",",decimal:".",easingFn:l,formattingFn:o,prefix:"",suffix:""},r&&"object"==typeof r)for(var f in c.options)r.hasOwnProperty(f)&&null!==r[f]&&(c.options[f]=r[f]);""===c.options.separator&&(c.options.useGrouping=!1),c.initialize=function(){return!!c.initialized||(c.d="string"==typeof a?document.getElementById(a):a,c.d?(c.startVal=Number(t),c.endVal=Number(e),s(c.startVal)&&s(c.endVal)?(c.decimals=Math.max(0,n||0),c.dec=Math.pow(10,c.decimals),c.duration=1e3*Number(i)||2e3,c.countDown=c.startVal>c.endVal,c.frameVal=c.startVal,c.initialized=!0,!0):(console.error("[CountUp] startVal or endVal is not a number",c.startVal,c.endVal),!1)):(console.error("[CountUp] target is null or undefined",c.d),!1))},c.printValue=function(a){var t=c.options.formattingFn(a);"INPUT"===c.d.tagName?this.d.value=t:"text"===c.d.tagName||"tspan"===c.d.tagName?this.d.textContent=t:this.d.innerHTML=t},c.count=function(a){c.startTime||(c.startTime=a),c.timestamp=a;var t=a-c.startTime;c.remaining=c.duration-t,c.options.useEasing?c.countDown?c.frameVal=c.startVal-c.options.easingFn(t,0,c.startVal-c.endVal,c.duration):c.frameVal=c.options.easingFn(t,c.startVal,c.endVal-c.startVal,c.duration):c.countDown?c.frameVal=c.startVal-(c.startVal-c.endVal)*(t/c.duration):c.frameVal=c.startVal+(c.endVal-c.startVal)*(t/c.duration),c.countDown?c.frameVal=c.frameVal<c.endVal?c.endVal:c.frameVal:c.frameVal=c.frameVal>c.endVal?c.endVal:c.frameVal,c.frameVal=Math.round(c.frameVal*c.dec)/c.dec,c.printValue(c.frameVal),t<c.duration?c.rAF=requestAnimationFrame(c.count):c.callback&&c.callback()},c.start=function(a){c.initialize()&&(c.callback=a,c.rAF=requestAnimationFrame(c.count))},c.pauseResume=function(){c.paused?(c.paused=!1,delete c.startTime,c.duration=c.remaining,c.startVal=c.frameVal,requestAnimationFrame(c.count)):(c.paused=!0,cancelAnimationFrame(c.rAF))},c.reset=function(){c.paused=!1,delete c.startTime,c.initialized=!1,c.initialize()&&(cancelAnimationFrame(c.rAF),c.printValue(c.startVal))},c.update=function(a){if(c.initialize())return a=Number(a),s(a)?void(a!==c.frameVal&&(cancelAnimationFrame(c.rAF),c.paused=!1,delete c.startTime,c.startVal=c.frameVal,c.endVal=a,c.countDown=c.startVal>c.endVal,c.rAF=requestAnimationFrame(c.count))):void console.error("[CountUp] update() - new endVal is not a number",a)},c.initialize()&&c.printValue(c.startVal)};return n});

    jQuery(document).ready(function () {

        jQuery.each(jQuery('.countup-tile h3'), function () {

            var numTo = Number(this.innerHTML);
            var suffix = "";
            if (isNaN(numTo)) {
                numTo = Number(this.innerHTML.replace("+", ""));
                suffix = "+";
            }

            var options = {
                useEasing: true,
                useGrouping: true,
                separator: ',',
                decimal: '.',
                suffix: suffix
            };
            var countup = new CountUp(this, 0, numTo, 0, 2.5, options);
            countup.start();

        });

    });
</script>
