<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2016 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sycms\Component\ContentType\Field;

use Symfony\Cmf\Component\ContentType\FieldInterface;
use Symfony\Cmf\Component\ContentType\MappingBuilder;
use Symfony\Cmf\Component\ContentType\View\ScalarView;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Sycms\Component\ContentType\Form\MarkdownType;
use Sycms\Component\ContentType\Model\Image;
use Sycms\Component\ContentType\Form\ImageType;

class ImageField implements FieldInterface
{
    public function getViewType()
    {
        return ScalarView::class;
    }

    public function getFormType()
    {
        return ImageType::class;
    }

    public function getMapping(MappingBuilder $builder)
    {
        return $builder->compound(Image::class)
            ->map('image', 'string')
            ->map('mimeType', 'string')
            ->map('originalFilename', 'string')
        ;
    }

    public function configureOptions(OptionsResolver $options)
    {
    }
}
