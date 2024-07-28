<?php

namespace App\Filament\Resources\VisitorTrackingsResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitorTrackingRelationManager extends RelationManager
{
    protected static string $relationship = 'visitorTrackings';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
# 'ip_address', 'user_agent', 'referer', 'target_page_id'                
                Forms\Components\TextInput::make('ip_address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_agent')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('referer')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('created_at')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ip_address')
            ->columns([
                Tables\Columns\TextColumn::make('ip_address')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('user_agent')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('referer')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
