<?php

namespace App\Services;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class BlockService
{
    public static function seoBlock(): Block
    {
        return Block::make('seo')
            ->schema([
                TextInput::make('title')
                    ->label('SEO Title')
                    ->required(),
                Textarea::make('meta_description')
                    ->label('Meta Description')
                    ->rows(3)
                    ->required(),
                TextInput::make('keywords')
                    ->label('Keywords')
                    ->placeholder('Separate keywords with commas')
                    ->required(),
            ])
            ->columns(2);
    }

    public static function heroBlock(): Block
    {
        return Block::make('hero')
            ->schema([
                TextInput::make('title')
                    ->label('Hero Title')
                    ->required(),
                Textarea::make('subtitle')
                    ->label('Hero Subtitle')
                    ->required(),
                FileUpload::make('background_image')
                    ->label('Background Image')
                    ->image()
                    ->required(),
                TextInput::make('button_label')
                    ->label('Button Label')
                    ->required(),
                TextInput::make('button_url')
                    ->label('Button URL')
                    ->required(),
            ])
            ->columns(2);
    }

    public static function featuresBlock(): Block
    {
        return Block::make('features')
            ->schema([
                TextInput::make('heading')
                    ->label('Section Heading')
                    ->required(),
                Textarea::make('description')
                    ->label('Section Description'),
                Repeater::make('features')
                    ->label('Features')
                    ->schema([
                        TextInput::make('title')
                            ->label('Feature Title')
                            ->required(),
                        Textarea::make('description')
                            ->label('Feature Description')
                            ->required(),
                        FileUpload::make('icon')
                            ->label('Feature Icon')
                            ->image(),
                    ])
                    ->addActionLabel('Add Feature')
                    ->minItems(1)
                    ->columns(2),
            ])
            ->columns(2);
    }

    public static function imageBlock(): Block
    {
        return Block::make('image')
            ->schema([
                FileUpload::make('url')
                    ->label('Image')
                    ->image()
                    ->required(),
                TextInput::make('alt')
                    ->label('Alt text')
                    ->required(),
                TextInput::make('link')
                    ->label('Optional Link'),
            ]);
    }

    public static function buttonBlock(): Block
    {
        return Block::make('button')
            ->schema([
                TextInput::make('label')
                    ->label('Button Text')
                    ->required(),
                TextInput::make('url')
                    ->label('Button URL')
                    ->required(),
                Select::make('style')
                    ->label('Button Style')
                    ->options([
                        'primary' => 'Primary',
                        'secondary' => 'Secondary',
                        'success' => 'Success',
                        'danger' => 'Danger',
                    ])
                    ->required(),
            ])
            ->columns(2);
    }

    public static function videoBlock(): Block
    {
        return Block::make('video')
            ->schema([
                TextInput::make('url')
                    ->label('Video URL (YouTube, Vimeo)')
                    ->required(),
                TextInput::make('caption')
                    ->label('Video Caption'),
            ]);
    }

    public static function testimonialBlock(): Block
    {
        return Block::make('testimonials')
            ->schema([
                TextInput::make('heading')
                    ->label('Section Heading')
                    ->required(),
                Repeater::make('testimonials')
                    ->schema([
                        Textarea::make('quote')
                            ->label('Testimonial Quote')
                            ->required(),
                        TextInput::make('author')
                            ->label('Author Name')
                            ->required(),
                        TextInput::make('position')
                            ->label('Author Position/Company'),
                    ])
                    ->minItems(1)
                    ->columns(2)
                    ->addActionLabel('Add Testimonial'),
            ])
            ->columns(2);
    }

    public static function faqBlock(): Block
    {
        return Block::make('faq_section')
            ->schema([
                TextInput::make('heading')
                    ->label('Section Heading')
                    ->required(),
                Repeater::make('faqs')
                    ->schema([
                        TextInput::make('question')
                            ->label('FAQ Question')
                            ->required(),
                        Textarea::make('answer')
                            ->label('FAQ Answer')
                            ->required(),
                    ])
                    ->minItems(1)
                    ->columns(2)
                    ->addActionLabel('Add FAQ'),
            ])
            ->columns(2);
    }

    public static function ctaBlock(): Block
    {
        return Block::make('cta')
            ->schema([
                TextInput::make('heading')
                    ->label('CTA Heading')
                    ->required(),
                Textarea::make('description')
                    ->label('CTA Description')
                    ->required(),
                TextInput::make('button_label')
                    ->label('Button Label')
                    ->required(),
                TextInput::make('button_url')
                    ->label('Button URL')
                    ->required(),
            ])
            ->columns(2);
    }

    public static function contactFormBlock(): Block
    {
        return Block::make('contact_form')
            ->schema([
                TextInput::make('heading')
                    ->label('Form Heading')
                    ->required(),
                Textarea::make('description')
                    ->label('Form Description'),
                TextInput::make('email')
                    ->label('Recipient Email')
                    ->required(),
            ])
            ->columns(2);
    }

    public static function footerBlock(): Block
    {
        return Block::make('footer')
            ->schema([
                TextInput::make('company_name')
                    ->label('Company Name')
                    ->required(),
                TextInput::make('address')
                    ->label('Address'),
                TextInput::make('phone')
                    ->label('Phone Number'),
                TextInput::make('email')
                    ->label('Email Address')
                    ->required(),
                Repeater::make('links')
                    ->label('Footer Links')
                    ->schema([
                        TextInput::make('label')
                            ->label('Link Label')
                            ->required(),
                        TextInput::make('url')
                            ->label('Link URL')
                            ->required(),
                    ])
                    ->minItems(1)
                    ->columns(2)
                    ->addActionLabel('Add Link'),
            ])
            ->columns(2);
    }
}
