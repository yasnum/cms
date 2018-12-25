<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_social1 extends td_style {

    private $unique_style_class;
    private $atts = array();
    private $index_style;

    function __construct( $atts, $index_style = '') {
        $this->atts = $atts;
        $this->index_style = $index_style;
    }

	private function get_css() {

        $compiled_css = '';

        $unique_style_class = $this->unique_style_class;

		$raw_css =
			"<style>

                /* @icons_size */
				.$unique_style_class .tdm-social-item i {
					font-size: @icons_size;
					vertical-align: middle;
				}
				.$unique_style_class .tdm-social-item i.td-icon-twitter,
				.$unique_style_class .tdm-social-item i.td-icon-linkedin,
				.$unique_style_class .tdm-social-item i.td-icon-pinterest,
				.$unique_style_class .tdm-social-item i.td-icon-blogger,
				.$unique_style_class .tdm-social-item i.td-icon-vimeo {
					font-size: @icons_size_fix;
				}
				/* @icons_padding */
				.$unique_style_class .tdm-social-item {
					width: @icons_padding;
					height: @icons_padding;
				}
				.$unique_style_class .tdm-social-item i {
					line-height: @icons_padding;
				}
				/* @icons_margin_right */
				.$unique_style_class .tdm-social-item {
				    margin: @icons_margin_top_bottom @icons_margin_right @icons_margin_top_bottom 0;
				}
                /* @icons_color */
				.$unique_style_class .tdm-social-item i,
				.tds-team-member2 .$unique_style_class.tds-social1 .tdm-social-item i {
					color: @icons_color;
				}
				/* @icons_hover_color */
				.$unique_style_class .tdm-social-item:hover i,
				.tds-team-member2 .$unique_style_class.tds-social1 .tdm-social-item:hover i {
					color: @icons_hover_color;
				}
				

			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->atts);

        $compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

    /**
     * Callback pe media
     *
     * @param $responsive_context td_res_context
     * @param $atts
     */
    static function cssMedia( $res_ctx ) {

        /*-- ICON -- */
        // icons size
        $icons_size = $res_ctx->get_shortcode_att( 'icons_size' );
        $res_ctx->load_settings_raw( 'icons_size',  $icons_size . 'px' );
        $res_ctx->load_settings_raw(  'icons_size_fix', $icons_size * 0.8  . 'px');

        // icons padding
        $res_ctx->load_settings_raw( 'icons_padding', $icons_size * $res_ctx->get_shortcode_att( 'icons_padding' ) . 'px' );

        // icons spacing
        $icons_spacing = $res_ctx->get_shortcode_att( 'icons_spacing' );
        if( $icons_spacing != '' ) {
            if ( is_numeric( $icons_spacing ) ) {
                $res_ctx->load_settings_raw( 'icons_margin_right',  $icons_spacing . 'px' );
                $res_ctx->load_settings_raw( 'icons_margin_top_bottom',  $icons_spacing / 2 . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'icons_margin_right', '10px' );
            $res_ctx->load_settings_raw( 'icons_margin_top_bottom', '5px' );
        }

        // icons color
        $res_ctx->load_settings_raw( 'icons_color', $res_ctx->get_style_att( 'icons_color', __CLASS__ ) );

        // icons hover color
        $res_ctx->load_settings_raw( 'icons_hover_color', $res_ctx->get_style_att( 'icons_hover_color', __CLASS__ ) );

    }

    function render( $index_style = '' ) {
        if ( ! empty( $index_style ) ) {
            $this->index_template = $index_style;
        }
        $this->unique_style_class = td_global::td_generate_unique_id();

        // social open in new window
        $target = '';
        if ( '' !== $this->get_shortcode_att( 'open_in_new_window' ) ) {
            $target = ' target="_blank" ';
        }

        $buffy = PHP_EOL . '<style>' . PHP_EOL . $this->get_css() . PHP_EOL . '</style>';

        $buffy .= '<div class="tdm-social-wrapper ' . self::get_class_style(__CLASS__) . ' ' . $this->unique_style_class . '">';
            $social_array = array();
            $social_array['behance']    = $this->get_shortcode_att( 'behance' );
            $social_array['blogger']    = $this->get_shortcode_att( 'blogger' );
            $social_array['dribbble']   = $this->get_shortcode_att( 'dribbble' );
            $social_array['facebook']   = $this->get_shortcode_att( 'facebook' );
            $social_array['flickr']     = $this->get_shortcode_att( 'flickr' );
            $social_array['googleplus'] = $this->get_shortcode_att( 'googleplus' );
            $social_array['instagram']  = $this->get_shortcode_att( 'instagram' );
            $social_array['lastfm']     = $this->get_shortcode_att( 'lastfm' );
            $social_array['linkedin']   = $this->get_shortcode_att( 'linkedin' );
            $social_array['pinterest']  = $this->get_shortcode_att( 'pinterest' );
            $social_array['rss']        = $this->get_shortcode_att( 'rss' );
            $social_array['soundcloud'] = $this->get_shortcode_att( 'soundcloud' );
            $social_array['tumblr']     = $this->get_shortcode_att( 'tumblr' );
            $social_array['twitter']    = $this->get_shortcode_att( 'twitter' );
            $social_array['vimeo']      = $this->get_shortcode_att( 'vimeo' );
            $social_array['youtube']    = $this->get_shortcode_att( 'youtube' );
            $social_array['vk']         = $this->get_shortcode_att( 'vk' );

            foreach ( $social_array as $social_key => $social_value ) {
                if( !empty( $social_value ) ) {
                    $buffy .= '<a href="' . $social_value . '" ' . $target . 'class="tdm-social-item"><i class="td-icon-font td-icon-' . $social_key . '"></i></a>';
                }
            }
        $buffy .= '</div>';

		return $buffy;
	}

    function get_style_att( $att_name ) {
        return $this->get_att( $att_name ,__CLASS__, $this->index_style );
    }

    function get_atts() {
        return $this->atts;
    }
}