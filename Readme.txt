<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentsResource\Pages;
use App\Models\Content;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;

class ContentsResource extends Resource
{
    protected static ?string $model = Content::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Courses';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('course_id')
                ->label('Course')
                ->relationship('course', 'title')
                ->required(),

            TextInput::make('title')
                ->label('Content Title')
                ->required()
                ->maxLength(255),

            Select::make('type')
                ->label('Content Type')
                ->options([
                    'text' => 'Text',
                    'video' => 'Video',
                    'quiz' => 'Quiz',
                ])
                ->required()
                ->live(),

            RichEditor::make('content_text')
                ->label('Content (Text)')
                ->columnSpanFull()
                ->visible(fn ($get) => $get('type') === 'text'),

            TextInput::make('video_url')
                ->label('Video URL')
                ->visible(fn ($get) => $get('type') === 'video'),

            TextInput::make('duration')
                ->label('Duration (Minutes)')
                ->numeric()
                ->minValue(0)
                ->visible(fn ($get) => $get('type') === 'video'),

            Textarea::make('quiz_data')
                ->label('Quiz Content')
                ->rows(4)
                ->visible(fn ($get) => $get('type') === 'quiz'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),

                TextColumn::make('course.title')
                    ->label('Course')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->wrap(),

                BadgeColumn::make('type')
                    ->colors([
                        'primary' => 'text',
                        'success' => 'video',
                        'warning' => 'quiz',
                    ])
                    ->sortable(),

                TextColumn::make('content_text')
                    ->label('Text Content')
                    ->limit(50)
                    ->wrap()
                    ->visible(fn ($record) => $record && $record->type === 'text'),

                TextColumn::make('video_url')
                    ->label('Video URL')
                    ->limit(50)
                    ->copyable()
                    ->copyMessage('Copied!')
                    ->visible(fn ($record) => $record && $record->type === 'video'),

                TextColumn::make('quiz_data')
                    ->label('Quiz')
                    ->limit(50)
                    ->wrap()
                    ->visible(fn ($record) => $record && $record->type === 'quiz'),

                TextColumn::make('duration')
                    ->label('Duration')
                    ->suffix(' min')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListContents::route('/'),
            'create' => Pages\CreateContents::route('/create'),
            'view' => Pages\ViewContents::route('/{record}'),
            'edit' => Pages\EditContents::route('/{record}/edit'),
        ];
    }
}























<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentsResource\Pages;
use App\Models\Content;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;

class ContentsResource extends Resource
{
    protected static ?string $model = Content::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Courses';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('course_id')
                ->label('Course')
                ->relationship('course', 'title')
                ->required(),

            TextInput::make('title')
                ->label('Content Title')
                ->required()
                ->maxLength(255),

            Select::make('type')
                ->label('Content Type')
                ->options([
                    'text' => 'Text',
                    'video' => 'Video',
                    'quiz' => 'Quiz',
                ])
                ->required()
                ->live(),

            RichEditor::make('content_text')
                ->label('Content (Text)')
                ->columnSpanFull()
                ->visible(fn ($get) => $get('type') === 'text'),

            TextInput::make('video_url')
                ->label('Video URL')
                ->visible(fn ($get) => $get('type') === 'video'),

            TextInput::make('duration')
                ->label('Duration (Minutes)')
                ->numeric()
                ->minValue(0)
                ->visible(fn ($get) => $get('type') === 'video'),

            Textarea::make('quiz_data')
                ->label('Quiz Content')
                ->rows(4)
                ->visible(fn ($get) => $get('type') === 'quiz'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),

                TextColumn::make('course.title')
                    ->label('Course')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->wrap(),

                BadgeColumn::make('type')
                    ->colors([
                        'primary' => 'text',
                        'success' => 'video',
                        'warning' => 'quiz',
                    ])
                    ->sortable(),

                TextColumn::make('content_text')
                    ->label('Text Content')
                    ->limit(50)
                    ->wrap()
                    ->visible(fn ($record) => $record && $record->type === 'text'),

                TextColumn::make('video_url')
                    ->label('Video URL')
                    ->limit(50)
                    ->copyable()
                    ->copyMessage('Copied!')
                    ->visible(fn ($record) => $record && $record->type === 'video'),

                TextColumn::make('quiz_data')
                    ->label('Quiz')
                    ->limit(50)
                    ->wrap()
                    ->visible(fn ($record) => $record && $record->type === 'quiz'),

                TextColumn::make('duration')
                    ->label('Duration')
                    ->suffix(' min')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListContents::route('/'),
            'create' => Pages\CreateContents::route('/create'),
            'view' => Pages\ViewContents::route('/{record}'),
            'edit' => Pages\EditContents::route('/{record}/edit'),
        ];
    }
}
























<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentsResource\Pages;
use App\Filament\Resources\ContentsResource\RelationManagers;
use App\Models\Content;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContentsResource extends Resource
{
    protected static ?string $model = Content::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('course_id')->label('Course')->relationship('course', 'title')->required(),
            TextInput::make('title')->label('Content Title')->required()->maxLength(255),
            Select::make('type')
                ->label('Content Type')
                ->options([
                    'text' => 'Text',
                    'video' => 'Video',
                    'quiz' => 'Quiz',
                ])
                ->required()
                ->live(),
            RichEditor::make('content_text')->label('Content (Text)')->columnSpanFull()->visible(fn($get) => $get('type') === 'text'),
            TextInput::make('video_url')->label('Video URL')->visible(fn($get) => $get('type') === 'video'),
            TextInput::make('duration')->label('Duration (Minutes)')->numeric()->minValue(0)->visible(fn($get) => $get('type') === 'video'),
            Textarea::make('quiz_data')->label('Quiz Content')->rows(4)->visible(fn($get) => $get('type') === 'quiz'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
    TextColumn::make('id')->sortable(),

    TextColumn::make('course.title')
        ->label('Course')
        ->sortable()
        ->searchable(),

    TextColumn::make('title')
        ->sortable()
        ->searchable()
        ->wrap(),

    BadgeColumn::make('type')
        ->colors([
            'primary' => 'text',
            'success' => 'video',
            'warning' => 'quiz',
        ])
        ->sortable(),

    TextColumn::make('content_text')
        ->label('Text Content')
        ->limit(50)
        ->wrap()
        ->visible(fn ($record) => $record->type === 'text'),

    TextColumn::make('video_url')
        ->label('Video URL')
        ->limit(50)
        ->copyable()
        ->copyMessage('Copied!')
        ->visible(fn ($record) => $record->type === 'video'),

    TextColumn::make('quiz_data')
        ->label('Quiz')
        ->limit(50)
        ->wrap()
        ->visible(fn ($record) => $record->type === 'quiz'),

    TextColumn::make('duration')
        ->label('Duration')
        ->suffix(' min')
        ->sortable(),

    TextColumn::make('created_at')
        ->dateTime()
        ->sortable(),
])

            ->filters([
                //
            ])
            ->actions([Tables\Actions\ViewAction::make(), Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
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
            'index' => Pages\ListContents::route('/'),
            'create' => Pages\CreateContents::route('/create'),
            'view' => Pages\ViewContents::route('/{record}'),
            'edit' => Pages\EditContents::route('/{record}/edit'),
        ];
    }
}
























<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentsResource\Pages;
use App\Filament\Resources\ContentsResource\RelationManagers;
use App\Models\Content;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContentsResource extends Resource
{
    protected static ?string $model = Content::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('course_id')->label('Course')->relationship('course', 'title')->required(),
            TextInput::make('title')->label('Content Title')->required()->maxLength(255),
            Select::make('type')
                ->label('Content Type')
                ->options([
                    'text' => 'Text',
                    'video' => 'Video',
                    'quiz' => 'Quiz',
                ])
                ->required()
                ->live(),
            RichEditor::make('content_text')->label('Content (Text)')->columnSpanFull()->visible(fn($get) => $get('type') === 'text'),
            TextInput::make('video_url')->label('Video URL')->visible(fn($get) => $get('type') === 'video'),
            TextInput::make('duration')->label('Duration (Minutes)')->numeric()->minValue(0)->visible(fn($get) => $get('type') === 'video'),
            Textarea::make('quiz_data')->label('Quiz Content')->rows(4)->visible(fn($get) => $get('type') === 'quiz'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('course.title')->label('Course')->sortable()->searchable(),
                TextColumn::make('title')->sortable()->searchable()->wrap(),
                BadgeColumn::make('type')->colors([
                    'primary' => 'text',
                    'success' => 'video',
                    'warning' => 'quiz',
                ]),
                TextColumn::make('duration')->label('Duration')->suffix(' min'),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\ViewAction::make(), Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
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
            'index' => Pages\ListContents::route('/'),
            'create' => Pages\CreateContents::route('/create'),
            'view' => Pages\ViewContents::route('/{record}'),
            'edit' => Pages\EditContents::route('/{record}/edit'),
        ];
    }
}
