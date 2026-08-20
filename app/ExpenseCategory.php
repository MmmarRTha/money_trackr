<?php

namespace App;

enum ExpenseCategory: string
{
    case Food = 'food';
    case Transportation = 'transportation';
    case Health = 'health';
    case Entertainment = 'entertainment';
    case Subscriptions = 'subscriptions';
    case Beauty = 'beauty';
    case Clothing = 'clothing';
    case Home = 'home';
    case Education = 'education';
    case Pets = 'pets';
    case Other = 'other';

    public function label(): string
    {
        return match ($this) {
            self::Food => 'Food and Groceries',
            self::Transportation => 'Transportation',
            self::Health => 'Health',
            self::Entertainment => 'Entertainment',
            self::Subscriptions => 'Subscriptions',
            self::Beauty => 'Beauty and Personal Care',
            self::Clothing => 'Clothing and Footwear',
            self::Home => 'Home',
            self::Education => 'Education',
            self::Pets => 'Pets',
            self::Other => 'Miscellaneous Expenses',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Food => 'bg-emerald-500/15 text-emerald-300 ring-emerald-500/30',
            self::Transportation => 'bg-sky-500/15 text-sky-300 ring-sky-500/30',
            self::Health => 'bg-rose-500/15 text-rose-300 ring-rose-500/30',
            self::Entertainment => 'bg-violet-500/15 text-violet-300 ring-violet-500/30',
            self::Subscriptions => 'bg-blue-500/15 text-blue-300 ring-blue-500/30',
            self::Beauty => 'bg-pink-500/15 text-pink-300 ring-pink-500/30',
            self::Clothing => 'bg-amber-500/15 text-amber-300 ring-amber-500/30',
            self::Home => 'bg-teal-500/15 text-teal-300 ring-teal-500/30',
            self::Education => 'bg-cyan-500/15 text-cyan-300 ring-cyan-500/30',
            self::Pets => 'bg-orange-500/15 text-orange-300 ring-orange-500/30',
            self::Other => 'bg-mist-500/15 text-mist-300 ring-mist-500/30',
        };

    }
}
