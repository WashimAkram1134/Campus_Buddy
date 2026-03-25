<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DistrictAssociationResource\Pages;
use App\Filament\Resources\DistrictAssociationResource\RelationManagers;
use App\Models\DistrictAssociation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DistrictAssociationResource extends Resource
{
    protected static ?string $model = DistrictAssociation::class;

    protected static ?string $navigationGroup = 'Community Setting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('division')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('community/district_associations/logos'),
                Forms\Components\TextInput::make('link')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('members_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\FileUpload::make('cover_image')
                    ->image()
                    ->directory('community/district_associations/covers')
                    ->label('Hero Image (Blue Portion)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('division')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\ImageColumn::make('cover_image')->label('Hero Image'),
                Tables\Columns\TextColumn::make('link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('members_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListDistrictAssociations::route('/'),
            'create' => Pages\CreateDistrictAssociation::route('/create'),
            'edit' => Pages\EditDistrictAssociation::route('/{record}/edit'),
        ];
    }
}
