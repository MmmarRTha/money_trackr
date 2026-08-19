import {Expense} from "@/types/expense";

type BudgetType = 'general' | 'goal';

export type Budget = {
    id: number;
    name: string;
    amount: string;
    type: BudgetType;
    created_at: string;
    expenses: Expense[]
};
