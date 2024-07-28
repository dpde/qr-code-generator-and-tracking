<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\TargetPage;
use Filament\Tables\Table;
use LaraZeus\Qr\Components\Qr;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TargetPageResource\Pages;
use App\Filament\Resources\TargetPageResource\RelationManagers;
use App\Filament\Resources\VisitorTrackingsResource\RelationManagers\TargetPageRelationManager;
use App\Filament\Resources\VisitorTrackingsResource\RelationManagers\VisitorTrackingRelationManager;

class TargetPageResource extends Resource
{
    protected static ?string $model = TargetPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->url(),
                \LaraZeus\Qr\Components\Qr::make('qr_code')
                    ->disabled()
                    ->asSlideOver()
                    ->optionsColumn('options')
                    ->actionIcon('heroicon-s-building-library'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('url')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime(),
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
            'visitorTrackings' => VisitorTrackingRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTargetPages::route('/'),
            'create' => Pages\CreateTargetPage::route('/create'),
            'edit' => Pages\EditTargetPage::route('/{record}/edit'),
        ];
    }
}
