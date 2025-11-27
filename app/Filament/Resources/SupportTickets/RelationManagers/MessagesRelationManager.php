<?php

namespace App\Filament\Resources\SupportTickets\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class MessagesRelationManager extends RelationManager
{
    protected static string $relationship = 'messages';

    protected static ?string $recordTitleAttribute = 'content';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('content')
                    ->required()
                    ->label('Message')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('attachments')
                    ->multiple()
                    ->directory('ticket-attachments')
                    ->label('Attachments (optional)')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_internal')
                    ->label('Internal Note')
                    ->helperText('Internal notes are not visible to clients')
                    ->default(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('content')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('From')
                    ->searchable(),
                Tables\Columns\TextColumn::make('content')
                    ->label('Message')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_internal')
                    ->label('Internal')
                    ->boolean()
                    ->trueIcon('heroicon-o-eye-slash')
                    ->falseIcon('heroicon-o-eye')
                    ->trueColor('warning')
                    ->falseColor('success'),
                Tables\Columns\IconColumn::make('has_attachments')
                    ->label('Attachments')
                    ->boolean()
                    ->getStateUsing(fn ($record) => !empty($record->attachments))
                    ->trueIcon('heroicon-o-paper-clip')
                    ->falseIcon('heroicon-o-minus'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_internal')
                    ->label('Internal Notes')
                    ->placeholder('All messages')
                    ->trueLabel('Internal only')
                    ->falseLabel('Public only'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Add Message'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
