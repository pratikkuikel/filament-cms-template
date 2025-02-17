<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages\CreatePage;
use App\Filament\Resources\PageResource\Pages\EditPage;
use App\Filament\Resources\PageResource\Pages\ListPages;
use App\Models\Page;
use App\Services\BlockService;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Builder as ComponentsBuilder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Override;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

    #[Override]
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ComponentsBuilder::make('data')
                    ->label('Everything related to the page here !')
                    ->columnSpanFull()
                    ->blockNumbers(false)
                    ->addActionLabel('Add a new block')
                    ->collapsible()
                    ->cloneable()
                    ->blockPickerColumns(3)
                    ->blockPickerWidth('2xl')
                    ->deleteAction(
                        fn (Action $action) => $action->requiresConfirmation(),
                    )
                    ->blocks([
                        BlockService::seoBlock(),
                        BlockService::heroBlock(),
                        BlockService::featuresBlock(),
                        BlockService::imageBlock(),
                        BlockService::buttonBlock(),
                        BlockService::videoBlock(),
                        BlockService::testimonialBlock(),
                        BlockService::faqBlock(),
                        BlockService::ctaBlock(),
                        BlockService::contactFormBlock(),
                        BlockService::footerBlock(),
                    ]),
            ]);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('data->hello'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    #[Override]
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'edit' => EditPage::route('/{record}/edit'),
        ];
    }
}
