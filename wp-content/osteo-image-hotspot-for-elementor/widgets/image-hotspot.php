<?php

namespace Osteo_Image_Hotspot\Widgets;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

defined( 'ABSPATH' ) || die();

class Osteo_Image_Hotspot extends Widget_Base {

    public function get_name() {
        return "Osteo_Image_Hotspot";
    }

    public function get_title() {
        return esc_html__( "Osteo Image Hotspot", 'osteo-image-hotspot' );
    }

    public function get_icon() {
        return 'eicon-image-hotspot';
    }

    public function get_keywords() {
        return ['image-hotspot', 'hotspot', 'image'];
    }

    public function get_categories() {
        return array( 'basic' );
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'hotspot_content',
            [
                'label' => esc_html__( 'Content', 'osteo-image-hotspot' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'hotspot_content_theme',
            [
                'label'       => esc_html__( 'Theme', 'osteo-image-hotspot' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'white',
                'label_block' => false,
                'options'     => [
                    'white'       => esc_html__( 'White', 'osteo-image-hotspot' ),
                    'black'       => esc_html__( 'Black', 'osteo-image-hotspot' ),
                    'red'         => esc_html__( 'Red', 'osteo-image-hotspot' ),
                    'pink'        => esc_html__( 'Pink', 'osteo-image-hotspot' ),
                    'purple'      => esc_html__( 'Purple', 'osteo-image-hotspot' ),
                    'deep-purple' => esc_html__( 'Deep Purple', 'osteo-image-hotspot' ),
                    'indigo'      => esc_html__( 'Indigo', 'osteo-image-hotspot' ),
                    'blue'        => esc_html__( 'Blue', 'osteo-image-hotspot' ),
                    'light-blue'  => esc_html__( 'Light Blue', 'osteo-image-hotspot' ),
                    'cyan'        => esc_html__( 'Cyan', 'osteo-image-hotspot' ),
                    'teal'        => esc_html__( 'Teal', 'osteo-image-hotspot' ),
                    'green'       => esc_html__( 'Green', 'osteo-image-hotspot' ),
                    'light-green' => esc_html__( 'Light Green', 'osteo-image-hotspot' ),
                    'lime'        => esc_html__( 'Lime', 'osteo-image-hotspot' ),
                    'yellow'      => esc_html__( 'Yellow', 'osteo-image-hotspot' ),
                    'amber'       => esc_html__( 'Amber', 'osteo-image-hotspot' ),
                    'orange'      => esc_html__( 'Orange', 'osteo-image-hotspot' ),
                    'deep-orange' => esc_html__( 'Deep Orange', 'osteo-image-hotspot' ),
                    'brown'       => esc_html__( 'Brown', 'osteo-image-hotspot' ),
                    'grey'        => esc_html__( 'Grey', 'osteo-image-hotspot' ),
                    'blue-grey'   => esc_html__( 'Blue Grey', 'osteo-image-hotspot' ),
                ],
            ]
        );

        $this->add_control(
            'hotspot_animation',
            [
                'label'       => esc_html__( 'Animation', 'osteo-image-hotspot' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'swing',
                'label_block' => false,
                'options'     => [
                    'fade'  => esc_html__( 'Fade', 'osteo-image-hotspot' ),
                    'grow'  => esc_html__( 'Grow', 'osteo-image-hotspot' ),
                    'swing' => esc_html__( 'Swing', 'osteo-image-hotspot' ),
                    'slide' => esc_html__( 'Slide', 'osteo-image-hotspot' ),
                    'fall'  => esc_html__( 'Fall', 'osteo-image-hotspot' ),
                ],
            ]
        );

        $this->add_control(
            'hotspot_main_image',
            [
                'label'       => esc_html__( 'Choose Image', 'osteo-image-hotspot' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->start_controls_tabs( 'tabs_hotspot_content_field' );

        $repeater->start_controls_tab(
            'hotspot_content_tab',
            [
                'label' => esc_html__( 'Content', 'osteo-image-hotspot' ),
            ]
        );

        $repeater->add_control(
            'hotspot_active',
            [
                'label'        => esc_html__( 'Hotspot Active', 'osteo-image-hotspot' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'osteo-image-hotspot' ),
                'label_off'    => esc_html__( 'Hide', 'osteo-image-hotspot' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        $repeater->add_control(
            'hotspot_trigger',
            [
                'label'       => esc_html__( 'Trigger', 'osteo-image-hotspot' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'hover',
                'label_block' => false,
                'options'     => [
                    'click' => esc_html__( 'Click', 'osteo-image-hotspot' ),
                    'hover' => esc_html__( 'Hover', 'osteo-image-hotspot' ),
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_arrow_position',
            [
                'label'       => esc_html__( 'Arrow Position', 'osteo-image-hotspot' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'top',
                'label_block' => false,
                'options'     => [
                    'top'          => esc_html__( 'Top', 'osteo-image-hotspot' ),
                    'right'        => esc_html__( 'Right', 'osteo-image-hotspot' ),
                    'bottom'       => esc_html__( 'Bottom', 'osteo-image-hotspot' ),
                    'left'         => esc_html__( 'Left', 'osteo-image-hotspot' ),
                    'top-right'    => esc_html__( 'Top Right', 'osteo-image-hotspot' ),
                    'top-left'     => esc_html__( 'Top Left', 'osteo-image-hotspot' ),
                    'bottom-right' => esc_html__( 'Bottom Right', 'osteo-image-hotspot' ),
                    'bottom-left'  => esc_html__( 'Bottom Left', 'osteo-image-hotspot' ),
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_pointer_theme',
            [
                'label'       => esc_html__( 'Pointer Theme', 'osteo-image-hotspot' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'pointer-white',
                'label_block' => false,
                'options'     => [
                    'pointer-white'       => esc_html__( 'White', 'osteo-image-hotspot' ),
                    'pointer-black'       => esc_html__( 'Black', 'osteo-image-hotspot' ),
                    'pointer-red'         => esc_html__( 'Red', 'osteo-image-hotspot' ),
                    'pointer-pink'        => esc_html__( 'Pink', 'osteo-image-hotspot' ),
                    'pointer-purple'      => esc_html__( 'Purple', 'osteo-image-hotspot' ),
                    'pointer-deep-purple' => esc_html__( 'Deep Purple', 'osteo-image-hotspot' ),
                    'pointer-indigo'      => esc_html__( 'Indigo', 'osteo-image-hotspot' ),
                    'pointer-blue'        => esc_html__( 'Blue', 'osteo-image-hotspot' ),
                    'pointer-light-blue'  => esc_html__( 'Light Blue', 'osteo-image-hotspot' ),
                    'pointer-cyan'        => esc_html__( 'Cyan', 'osteo-image-hotspot' ),
                    'pointer-teal'        => esc_html__( 'Teal', 'osteo-image-hotspot' ),
                    'pointer-green'       => esc_html__( 'Green', 'osteo-image-hotspot' ),
                    'pointer-light-green' => esc_html__( 'Light Green', 'osteo-image-hotspot' ),
                    'pointer-lime'        => esc_html__( 'Lime', 'osteo-image-hotspot' ),
                    'pointer-yellow'      => esc_html__( 'Yellow', 'osteo-image-hotspot' ),
                    'pointer-amber'       => esc_html__( 'Amber', 'osteo-image-hotspot' ),
                    'pointer-orange'      => esc_html__( 'Orange', 'osteo-image-hotspot' ),
                    'pointer-deep-orange' => esc_html__( 'Deep Orange', 'osteo-image-hotspot' ),
                    'pointer-brown'       => esc_html__( 'Brown', 'osteo-image-hotspot' ),
                    'pointer-grey'        => esc_html__( 'Grey', 'osteo-image-hotspot' ),
                    'pointer-blue-grey'   => esc_html__( 'Blue Grey', 'osteo-image-hotspot' ),
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_pointer_icon',
            [
                'label'   => esc_html__( 'Hotspot Icon', 'osteo-image-hotspot' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-plus',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_responsive_control(
            'hotspot_position_top',
            [
                'label'      => esc_html__( 'Top', 'osteo-image-hotspot' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range'      => [
                    '%' => [
                        'max'  => 100,
                        'step' => .5,
                    ],
                ],
                'default'    => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .osteo-hotspots {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_responsive_control(
            'hotspot_position_left',
            [
                'label'      => esc_html__( 'Left', 'osteo-image-hotspot' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range'      => [
                    '%' => [
                        'max'  => 100,
                        'step' => .5,
                    ],
                ],
                'default'    => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .osteo-hotspots {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_content_options',
            [
                'label'     => esc_html__( 'Content', 'osteo-image-hotspot' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'hotspot_image_switch',
            [
                'label'        => esc_html__( 'Show Image', 'osteo-image-hotspot' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'osteo-image-hotspot' ),
                'label_off'    => esc_html__( 'Hide', 'osteo-image-hotspot' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        $repeater->add_control(
            'hotspot_image',
            [
                'label'     => esc_html__( 'Choose Image', 'osteo-image-hotspot' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'hotspot_image_switch' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_image_alt',
            [
                'label'     => esc_html__( 'Alt Tag', 'osteo-image-hotspot' ),
                'type'      => Controls_Manager::TEXTAREA,
                'condition' => [
                    'hotspot_image_switch' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_youtube_video_switch',
            [
                'label'        => esc_html__( 'Show Youtube Video', 'osteo-image-hotspot' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'osteo-image-hotspot' ),
                'label_off'    => esc_html__( 'Hide', 'osteo-image-hotspot' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        $repeater->add_control(
            'hotspot_youtube_video_id',
            [
                'label'     => esc_html__( 'Youtube Video ID', 'osteo-image-hotspot' ),
                'type'      => \Elementor\Controls_Manager::TEXTAREA,
                'condition' => [
                    'hotspot_youtube_video_switch' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_vimeo_video_switch',
            [
                'label'        => esc_html__( 'Show Vimeo Video', 'osteo-image-hotspot' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'osteo-image-hotspot' ),
                'label_off'    => esc_html__( 'Hide', 'osteo-image-hotspot' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        $repeater->add_control(
            'hotspot_vimeo_video_id',
            [
                'label'     => esc_html__( 'Vimeo Video ID', 'osteo-image-hotspot' ),
                'type'      => \Elementor\Controls_Manager::TEXTAREA,
                'condition' => [
                    'hotspot_vimeo_video_switch' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_soundcloud_audio_switch',
            [
                'label'        => esc_html__( 'Show Soundcloud Audio', 'osteo-image-hotspot' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'osteo-image-hotspot' ),
                'label_off'    => esc_html__( 'Hide', 'osteo-image-hotspot' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        $repeater->add_control(
            'hotspot_soundcloud_audio_id',
            [
                'label'     => esc_html__( 'Soundcloud Audio ID', 'osteo-image-hotspot' ),
                'type'      => \Elementor\Controls_Manager::TEXTAREA,
                'condition' => [
                    'hotspot_soundcloud_audio_switch' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_heading_switch',
            [
                'label'        => esc_html__( 'Show Heading', 'osteo-image-hotspot' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'osteo-image-hotspot' ),
                'label_off'    => esc_html__( 'Hide', 'osteo-image-hotspot' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $repeater->add_control(
            'hotspot_heading',
            [
                'label'       => esc_html__( 'Heading', 'osteo-image-hotspot' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'condition'   => [
                    'hotspot_heading_switch' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_heading_html_tag',
            [
                'label'     => esc_html__( 'HTML Tag', 'osteo-image-hotspot' ),
                'type'      => Controls_Manager::CHOOSE,
                'default'   => 'h2',
                'options'   => [
                    'h1' => [
                        'title' => esc_html__( 'H1', 'osteo-image-hotspot' ),
                        'icon'  => 'eicon-editor-h1',
                    ],
                    'h2' => [
                        'title' => esc_html__( 'H2', 'osteo-image-hotspot' ),
                        'icon'  => 'eicon-editor-h2',
                    ],
                    'h3' => [
                        'title' => esc_html__( 'H3', 'osteo-image-hotspot' ),
                        'icon'  => 'eicon-editor-h3',
                    ],
                    'h4' => [
                        'title' => esc_html__( 'H4', 'osteo-image-hotspot' ),
                        'icon'  => 'eicon-editor-h4',
                    ],
                    'h5' => [
                        'title' => esc_html__( 'H5', 'osteo-image-hotspot' ),
                        'icon'  => 'eicon-editor-h5',
                    ],
                    'h6' => [
                        'title' => esc_html__( 'H6', 'osteo-image-hotspot' ),
                        'icon'  => 'eicon-editor-h6',
                    ],
                ],
                'condition' => [
                    'hotspot_heading_switch' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_paragraph_switch',
            [
                'label'        => esc_html__( 'Show Paragraph', 'osteo-image-hotspot' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'osteo-image-hotspot' ),
                'label_off'    => esc_html__( 'Hide', 'osteo-image-hotspot' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $repeater->add_control(
            'hotspot_paragraph',
            [
                'label'       => esc_html__( 'Paragraph', 'osteo-image-hotspot' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur non accusantium obcaecati et ducimus consequatur possimus cumque necessitatibus, dolores id architecto nobis qui magnam iure optio maxime ad culpa, odit dolorem. Expedita illo eius deleniti in ipsam voluptas dolorum quaerat.', 'osteo-image-hotspot' ),
                'condition'   => [
                    'hotspot_paragraph_switch' => 'yes',
                ],
            ]
        );

        $repeater->end_controls_tab();

        //Style Tab
        $repeater->start_controls_tab(
            'hotspot_style_tab',
            [
                'label' => esc_html__( 'Style', 'osteo-image-hotspot' ),
            ]
        );

        $repeater->add_control(
            'hotspot_youtube_video_height',
            [
                'label'     => esc_html__( 'Height', 'osteo-image-hotspot' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 5,
                'max'       => 1000,
                'step'      => 20,
                'default'   => 250,
                'condition' => [
                    'hotspot_youtube_video_switch' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_vimeo_video_height',
            [
                'label'     => esc_html__( 'Height', 'osteo-image-hotspot' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 5,
                'max'       => 1000,
                'step'      => 20,
                'default'   => 250,
                'condition' => [
                    'hotspot_vimeo_video_switch' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'hotspot_soundcloud_audio_height',
            [
                'label'     => esc_html__( 'Height', 'osteo-image-hotspot' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 5,
                'max'       => 1000,
                'step'      => 20,
                'default'   => 250,
                'condition' => [
                    'hotspot_soundcloud_audio_switch' => 'yes',
                ],
            ]
        );

        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();

        $this->add_control(
            'hotspot_list',
            [
                'label'       => esc_html__( 'Single Pointer', 'osteo-image-hotspot' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'hotspot_heading'   => esc_html__( 'Welcome to Installing Osteo Image Hotspot', 'osteo-image-hotspot' ),
                        'hotspot_paragraph' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eveniet dolores illo quod adipisci, maiores officiis facilis ipsa consequatur porro!', 'osteo-image-hotspot' ),
                    ],
                    [
                        'hotspot_heading'   => esc_html__( 'Fully Responsive for Any Devices', 'osteo-image-hotspot' ),
                        'hotspot_paragraph' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eveniet dolores illo quod adipisci, maiores officiis facilis ipsa consequatur porro!', 'osteo-image-hotspot' ),
                    ],
                    [
                        'hotspot_heading'   => esc_html__( 'Perfectly Work With Any Theme', 'osteo-image-hotspot' ),
                        'hotspot_paragraph' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eveniet dolores illo quod adipisci, maiores officiis facilis ipsa consequatur porro!', 'osteo-image-hotspot' ),
                    ],
                    [
                        'hotspot_heading'   => esc_html__( 'Lightweight and Easy to Customize', 'osteo-image-hotspot' ),
                        'hotspot_paragraph' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eveniet dolores illo quod adipisci, maiores officiis facilis ipsa consequatur porro!', 'osteo-image-hotspot' ),
                    ],
                ],
                'title_field' => '{{hotspot_heading}}',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>

            <div class="osteo-tooltip-container" data-tooltipstyle="<?php echo esc_attr( $settings['hotspot_content_theme'] ); ?>" data-animation="<?php echo esc_attr( $settings['hotspot_animation'] ); ?>">
                <img src="<?php echo esc_url( $settings['hotspot_main_image']['url'] ); ?>" alt="">
                <div class="osteo-hotspots">
                    <?php foreach ( $settings['hotspot_list'] as $item ): ?>
                        <div class="elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?> osteo-single-hotspot-item">
                            <a href="#" class="osteo-tooltip pulse-effect" data-isopen="<?php echo esc_attr( $item['hotspot_active'] ); ?>" data-trigger="<?php echo esc_attr( $item['hotspot_trigger'] ); ?>" data-position="<?php echo esc_attr( $item['hotspot_arrow_position'] ); ?>">
                                <span>
                                    <div class="osteo-hotspot-content">
                                    <?php
                                    if ( 'yes' === $item['hotspot_image_switch'] ) {
                                        ?>
                                            <img src="<?php echo esc_url( $item['hotspot_image']['url'] ); ?>" width="<?php echo esc_attr( $item['hotspot_image_width'] ); ?>" alt="<?php echo esc_html( $item['hotspot_image_alt'] ); ?>">
                                        <?php
                                        }
                                    ?>
                                    <?php
                                        if ( 'yes' === $item['hotspot_youtube_video_switch'] ) {
                                            ?>
                                                <iframe src="https://www.youtube.com/embed/<?php echo esc_html( $item['hotspot_youtube_video_id'] ); ?>" height="<?php echo esc_html( $item['hotspot_youtube_video_height'] ); ?>" allowfullscreen></iframe>
                                            <?php
                                        }
                                    ?>
                                    <?php
                                        if ( 'yes' === $item['hotspot_vimeo_video_switch'] ) {
                                            ?>
                                                <iframe src="https://player.vimeo.com/video/<?php echo esc_attr( $item['hotspot_vimeo_video_id'] ); ?>" height="<?php echo esc_attr( $item['hotspot_vimeo_video_height'] ); ?>" allowfullscreen></iframe>
                                            <?php
                                        }
                                    ?>
                                    <?php
                                        if ( 'yes' === $item['hotspot_soundcloud_audio_switch'] ) {
                                            ?>
                                                <iframe height="<?php echo esc_attr( $item['hotspot_soundcloud_audio_height'] ); ?>" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo esc_attr( $item['hotspot_soundcloud_audio_id'] ); ?>&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                                            <?php
                                        }
                                    ?>


                                    <?php
if ( 'yes' === $item['hotspot_heading_switch'] ) {
            ?>
                                            <<?php esc_html_e( $item['hotspot_heading_html_tag'] );?>>
                                                <?php echo esc_html( $item['hotspot_heading'] ); ?>
                                            </<?php esc_html_e( $item['hotspot_heading_html_tag'] );?>>
                                            <?php
}
        ?>
                                    <?php
if ( 'yes' === $item['hotspot_paragraph_switch'] ) {
            ?>
                                            <p><?php echo esc_html( $item['hotspot_paragraph'] ); ?></p>
                                            <?php
}
        ?>
                                    </div>
                                </span>
                                <div class="<?php echo esc_attr( $item['hotspot_pointer_theme'] ); ?>">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['hotspot_pointer_icon'], ['aria-hidden' => 'true'] );?>
                                </div>
                            </a>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>

		<?php
}
}