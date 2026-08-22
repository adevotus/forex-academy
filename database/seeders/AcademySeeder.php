<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\MentorshipSession;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Robot;
use App\Models\Signal;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AcademySeeder extends Seeder
{
    public function run(): void
    {
        // --- Admin ---------------------------------------------------
        $admin = User::create([
            'name' => 'Academy Admin',
            'email' => 'admin@emmioxforex.academy',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 'approved',
            'registration_fee_paid' => true,
            'approved_at' => now(),
        ]);

        // --- Demo members ---------------------------------------------
        User::create([
            'name' => 'Amina Approved',
            'email' => 'member@emmioxforex.academy',
            'password' => Hash::make('password'),
            'role' => 'member',
            'status' => 'approved',
            'registration_fee_paid' => true,
            'approved_at' => now(),
        ]);

        User::create([
            'name' => 'Pending Peter',
            'email' => 'pending@emmioxforex.academy',
            'password' => Hash::make('password'),
            'role' => 'member',
            'status' => 'pending',
        ]);

        // --- Badges ------------------------------------------------------
        $badges = [
            ['name' => 'First Lesson', 'description' => 'Completed your first lesson', 'icon' => 'sparkles'],
            ['name' => 'Chart Reading Pro', 'description' => 'Completed the Intermediate course', 'icon' => 'chart'],
            ['name' => 'Robot Ready', 'description' => 'Activated your first trading robot', 'icon' => 'cpu'],
        ];
        foreach ($badges as $b) {
            Badge::create($b);
        }

        // --- Courses, leveled Starter -> Pro --------------------------
        $courseDefs = [
            [
                'title' => 'Forex Basics: Starter',
                'level' => 'starter',
                'is_free' => true,
                'price' => 0,
                'description' => 'What is forex, how the market works, and the core terminology every trader needs before touching a chart.',
                'lessons' => [
                    ['title' => 'What Is Forex Trading?', 'duration_minutes' => 6, 'is_preview' => true],
                    ['title' => 'Understanding Currency Pairs', 'duration_minutes' => 8, 'is_preview' => true],
                    ['title' => 'Pips, Lots & Leverage Explained', 'duration_minutes' => 9, 'is_preview' => false],
                ],
            ],
            [
                'title' => 'Technical Analysis: Intermediate',
                'level' => 'intermediate',
                'is_free' => false,
                'price' => 4900,
                'description' => 'Chart reading, support & resistance, indicators, and the fundamentals of risk management.',
                'lessons' => [
                    ['title' => 'Reading Candlestick Charts', 'duration_minutes' => 12, 'is_preview' => true],
                    ['title' => 'Support & Resistance Zones', 'duration_minutes' => 14, 'is_preview' => false],
                    ['title' => 'Risk-to-Reward & Position Sizing', 'duration_minutes' => 15, 'is_preview' => false],
                ],
            ],
            [
                'title' => 'Strategy & Psychology: Advanced',
                'level' => 'advanced',
                'is_free' => false,
                'price' => 7900,
                'description' => 'Building a personal trading strategy, mastering trading psychology, and preparing for robot integration.',
                'lessons' => [
                    ['title' => 'Building a Trading Strategy', 'duration_minutes' => 16, 'is_preview' => false],
                    ['title' => 'Trading Psychology & Discipline', 'duration_minutes' => 13, 'is_preview' => false],
                    ['title' => 'Integrating a Robot Into Your Plan', 'duration_minutes' => 11, 'is_preview' => false],
                ],
            ],
            [
                'title' => 'Account Flipping & Automation: Pro',
                'level' => 'pro',
                'is_free' => false,
                'price' => 12900,
                'description' => 'Advanced automation, aggressive account-flipping approaches, and how to interpret live trading signals.',
                'lessons' => [
                    ['title' => 'Account Flipping: Opportunity & Risk', 'duration_minutes' => 18, 'is_preview' => false],
                    ['title' => 'Advanced EA Configuration', 'duration_minutes' => 17, 'is_preview' => false],
                    ['title' => 'Interpreting Live Trading Signals', 'duration_minutes' => 14, 'is_preview' => false],
                ],
            ],
        ];

        foreach ($courseDefs as $i => $def) {
            $course = Course::create([
                'title' => $def['title'],
                'slug' => Str::slug($def['title']).'-'.Str::random(4),
                'description' => $def['description'],
                'level' => $def['level'],
                'price' => $def['price'],
                'is_free' => $def['is_free'],
                'published' => true,
                'order' => $i,
            ]);

            foreach ($def['lessons'] as $li => $lessonDef) {
                /** @var Lesson $lesson */
                $lesson = $course->lessons()->create([
                    'title' => $lessonDef['title'],
                    'description' => 'Part of '.$course->title.'.',
                    'video_url' => 'https://cdn.emmioxforex.academy/demo/placeholder.mp4',
                    'duration_minutes' => $lessonDef['duration_minutes'],
                    'order' => $li,
                    'is_preview' => $lessonDef['is_preview'],
                ]);

                $quiz = Quiz::create(['lesson_id' => $lesson->id, 'title' => 'Quick Check']);
                $question = Question::create([
                    'quiz_id' => $quiz->id,
                    'question' => "What was the main focus of \"{$lesson->title}\"?",
                    'order' => 0,
                ]);
                Option::create(['question_id' => $question->id, 'text' => 'The concept covered in this lesson', 'is_correct' => true]);
                Option::create(['question_id' => $question->id, 'text' => 'An unrelated stock market topic', 'is_correct' => false]);
                Option::create(['question_id' => $question->id, 'text' => 'Cryptocurrency mining', 'is_correct' => false]);
            }
        }

        // --- Robots / EAs ----------------------------------------------
        Robot::create([
            'name' => 'Financial Magnetic Robot EA',
            'slug' => 'financial-magnetic-robot-ea',
            'description' => 'Our flagship automated trading solution, designed to assist traders with systematic trade execution and disciplined market participation.',
            'version' => '3.2',
            'price' => 19900,
            'duration_days' => 90,
            'published' => true,
        ]);

        Robot::create([
            'name' => 'Magnetic Scalper EA',
            'slug' => 'magnetic-scalper-ea',
            'description' => 'A faster-paced companion EA tuned for short-term scalping opportunities on major pairs.',
            'version' => '1.4',
            'price' => 14900,
            'duration_days' => 90,
            'published' => true,
        ]);

        // --- Signals -----------------------------------------------------
        Signal::create([
            'pair' => 'EUR/USD', 'direction' => 'buy',
            'entry_price' => 1.0850, 'stop_loss' => 1.0800, 'take_profit' => 1.0950,
            'explainer' => 'Price reclaimed the 1.0830 support zone with bullish divergence on the 4H RSI — entry taken on the retest.',
            'status' => 'active', 'published_at' => now()->subDay(),
        ]);
        Signal::create([
            'pair' => 'GBP/JPY', 'direction' => 'sell',
            'entry_price' => 199.50, 'stop_loss' => 200.30, 'take_profit' => 197.80,
            'explainer' => 'Rejection from a major daily resistance trendline with bearish engulfing candle confirmation.',
            'status' => 'active', 'published_at' => now()->subHours(6),
        ]);
        Signal::create([
            'pair' => 'XAU/USD', 'direction' => 'buy',
            'entry_price' => 2385.00, 'stop_loss' => 2365.00, 'take_profit' => 2430.00,
            'explainer' => 'Gold bounced off the weekly demand zone as the US dollar index weakened after CPI data.',
            'status' => 'hit_tp', 'published_at' => now()->subDays(4),
        ]);

        // --- Mentorship -----------------------------------------------
        MentorshipSession::create([
            'title' => 'Group Mentorship — Monthly Cohort',
            'description' => 'Live group sessions covering strategy review, Q&A, and trade breakdowns with an EMMIOXFOREX mentor.',
            'mentor_name' => 'EMMIOXFOREX Senior Mentor',
            'type' => 'group',
            'price' => 9900,
            'published' => true,
        ]);
        MentorshipSession::create([
            'title' => '1-on-1 Mentorship Intensive',
            'description' => 'Personalised 1-on-1 guidance to build your trading plan, review your psychology, and refine your strategy.',
            'mentor_name' => 'EMMIOXFOREX Senior Mentor',
            'type' => 'one_on_one',
            'price' => 24900,
            'published' => true,
        ]);
    }
}
