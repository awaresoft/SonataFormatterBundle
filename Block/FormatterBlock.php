<?php

namespace Awaresoft\Sonata\FormatterBundle\Block;

use Symfony\Component\Form\FormBuilderInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\FormatterBundle\Block\FormatterBlockService as BaseFormatterBlockService;

/**
 * Extended FormatterBlock
 *
 * @author Bartosz Malec <b.malec@awaresoft.pl>
 */
class FormatterBlock extends BaseFormatterBlockService
{
    /**
     * {@inheritdoc}
     */
    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
        $formMapper->add('settings', 'sonata_type_immutable_array', array(
            'keys' => array(
                array('content', 'sonata_formatter_type', function (FormBuilderInterface $formBuilder) {
                    return array(
                        'event_dispatcher' => $formBuilder->getEventDispatcher(),
                        'format_field' => array('format', '[format]'),
                        'source_field' => array('rawContent', '[rawContent]'),
                        'target_field' => '[content]',
                        'ckeditor_toolbar_icons' => array(
                            array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'),
                            array('Scayt'),
                            array('Link', 'Unlink', 'Anchor'),
                            array('Image', 'Table', 'HorizontalRule', 'SpecialChar'),
                            array('Maximize'),
                            array('Source'),
                            '/',
                            array('Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'),
                            array('NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'),
                            array('Styles', 'Format', 'Font', 'FontSize', 'TextColor', 'BGColor'),
                            array('About')
                        )
                    );
                }),
            )
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'WYSIWYG editor';
    }
}
