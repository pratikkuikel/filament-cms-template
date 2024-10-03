<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Builder as ComponentsBuilder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Services\BlockService;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

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
                        fn(Action $action) => $action->requiresConfirmation(),
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
                    ])
            ]);
    }

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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
