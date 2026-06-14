<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CareerGuidanceController extends Controller
{
    private array $careerRequirements = [
        'Software Engineer'       => ['Communication','Problem Solving','Teamwork','Attention to Detail','Version Control (Git)','Programming (Python/Java/JS)'],
        'Data Analyst'            => ['Attention to Detail','Problem Solving','Teamwork','SQL','Data Visualisation','Python or R'],
        'UI/UX Designer'          => ['Creativity','Communication','Attention to Detail','Figma / Adobe XD','User Research','Prototyping'],
        'Cybersecurity Analyst'   => ['Problem Solving','Attention to Detail','Teamwork','Networking Fundamentals','Linux Basics','Security Certifications'],
        'AI/ML Engineer'          => ['Python','Mathematics','Problem Solving','Machine Learning Frameworks','Data Preprocessing','Research Skills'],
        'Marketing Executive'     => ['Communication','Creativity','Teamwork','Attention to Detail','Social Media Management','Content Creation'],
        'Human Resource Executive'=> ['Communication','Empathy','Teamwork','Organisation','Labour Law Basics','Conflict Resolution'],
        'Business Analyst'        => ['Critical Thinking','Communication','Teamwork','Excel / Data Analysis','SQL Basics','Presentation Skills'],
        'Accountant'              => ['Mathematics','Attention to Detail','Integrity','Financial Reporting','Accounting Software','Taxation Basics'],
        'Project Manager'         => ['Leadership','Communication','Problem Solving','Planning & Scheduling','Risk Management','Budgeting'],
        'Teacher'                 => ['Communication','Empathy','Patience','Teamwork','Lesson Planning','Classroom Management'],
        'Lecturer'                => ['Communication','Research Skills','Critical Thinking','Academic Writing','Subject Mastery','Public Speaking'],
        'Nurse'                   => ['Empathy','Communication','Teamwork','Attention to Detail','Patient Care Techniques'],
        'Pharmacist'              => ['Attention to Detail','Communication','Chemistry','Ethics','Patient Counselling'],
        'Graphic Designer'        => ['Creativity','Attention to Detail','Communication','Adobe Illustrator','Typography','Portfolio'],
        'Content Creator'         => ['Creativity','Communication','Consistency','Video Editing','Copywriting','Audience Engagement'],
        'Entrepreneur'            => ['Creativity','Resilience','Communication','Financial Literacy','Business Acumen','Networking'],
    ];

    private array $skillTips = [
        'Version Control (Git)'         => 'Complete the free Git course on GitHub Skills.',
        'Programming (Python/Java/JS)'   => 'Try freeCodeCamp or CS50 on edX — both free.',
        'SQL'                            => 'SQLZoo or Mode Analytics SQL tutorial — both free.',
        'Data Visualisation'             => 'Learn Power BI or Tableau — both have free student versions.',
        'Python or R'                    => 'Start with Python on Kaggle free micro-courses.',
        'Figma / Adobe XD'               => 'Figma has a free plan with official YouTube tutorials.',
        'User Research'                  => 'Read "Don\'t Make Me Think" by Steve Krug.',
        'Prototyping'                    => 'Practice with Figma prototyping — free tutorials on YouTube.',
        'Networking Fundamentals'        => 'CompTIA Network+ study guide — free PDFs available.',
        'Linux Basics'                   => 'Try "The Linux Command Line" free at linuxcommand.org.',
        'Security Certifications'        => 'CompTIA Security+ is the best entry-level cert to start with.',
        'Machine Learning Frameworks'    => 'Start with scikit-learn and follow fast.ai free course.',
        'Social Media Management'        => 'Take the free Hootsuite Social Marketing Certification.',
        'Content Creation'               => 'Start a blog or social page to build a real portfolio.',
        'Labour Law Basics'              => "Read Malaysia's Employment Act 1955 summary on the MOHR website.",
        'Conflict Resolution'            => 'Take a free negotiation course on Coursera.',
        'Excel / Data Analysis'          => 'Microsoft offers free Excel training on their support site.',
        'SQL Basics'                     => 'W3Schools SQL tutorial is a quick free starter.',
        'Presentation Skills'            => 'Practice with free PowerPoint or Google Slides templates.',
        'Financial Reporting'            => 'Coursera has free financial accounting courses from top unis.',
        'Accounting Software'            => 'MYOB offers free student trials — download and practise.',
        'Taxation Basics'                => 'LHDN Malaysia website has free tax guides for beginners.',
        'Planning & Scheduling'          => 'Learn Microsoft Project basics — free trial available.',
        'Risk Management'                => 'PMI offers free introductory risk management resources.',
        'Budgeting'                      => 'Khan Academy has a free Personal Finance & Budgeting course.',
        'Lesson Planning'                => 'Check MOE Malaysia curriculum guides — available free online.',
        'Classroom Management'           => 'Look for free MOOC courses on teaching methodology.',
        'Academic Writing'               => 'Enrol in a free academic writing MOOC on Coursera.',
        'Subject Mastery'                => 'Use your university library access to journals and textbooks.',
        'Public Speaking'                => 'Join Toastmasters or practise with mock presentations.',
        'Patient Care Techniques'        => 'Gain clinical hours through hospital attachments or volunteering.',
        'Patient Counselling'            => 'Look for pharmacy attachment programs at local hospitals.',
        'Chemistry'                      => 'Khan Academy Chemistry is free and well-structured.',
        'Adobe Illustrator'              => 'Adobe offers a free 30-day student trial — start there.',
        'Typography'                     => 'Read "Thinking with Type" by Ellen Lupton — free PDF online.',
        'Portfolio'                      => 'Create a free portfolio on Behance to showcase your work.',
        'Video Editing'                  => 'DaVinci Resolve is free and industry-grade — start there.',
        'Copywriting'                    => 'Read "The Copywriter\'s Handbook" — widely available online.',
        'Financial Literacy'             => 'Khan Academy has a free Personal Finance course.',
        'Business Acumen'                => 'Read "Zero to One" by Peter Thiel and follow startup blogs.',
        'Networking'                     => 'Attend free industry events and LinkedIn networking sessions.',
        'Research Skills'                => 'Your university library offers free journal access — use it!',
        'Data Preprocessing'             => 'Kaggle Learn has a free data cleaning micro-course.',
        'Mathematics'                    => 'Khan Academy Linear Algebra and Statistics — both free.',
    ];

    private array $fieldAffinities = [
        'computer'   => ['Programming (Python/Java/JS)','Problem Solving','Data Structures','Version Control (Git)','Python','SQL'],
        'it'         => ['Programming (Python/Java/JS)','Networking Fundamentals','Linux Basics','Problem Solving'],
        'software'   => ['Programming (Python/Java/JS)','Problem Solving','Version Control (Git)','Teamwork'],
        'data'       => ['SQL','Python or R','Data Visualisation','Attention to Detail','Statistical Analysis'],
        'design'     => ['Figma / Adobe XD','Creativity','Visual Design','Adobe Illustrator','Typography'],
        'art'        => ['Creativity','Adobe Illustrator','Typography','Portfolio'],
        'business'   => ['Communication','Teamwork','Critical Thinking','Presentation Skills','Excel / Data Analysis'],
        'marketing'  => ['Communication','Creativity','Social Media Management','Content Creation'],
        'accounting' => ['Mathematics','Attention to Detail','Financial Reporting','Integrity'],
        'finance'    => ['Mathematics','Financial Reporting','Budgeting','Attention to Detail'],
        'education'  => ['Communication','Patience','Empathy','Lesson Planning','Subject Mastery'],
        'teaching'   => ['Communication','Patience','Empathy','Classroom Management'],
        'nursing'    => ['Patient Care Techniques','Empathy','Communication','Teamwork'],
        'health'     => ['Empathy','Communication','Attention to Detail','Teamwork'],
        'psychology' => ['Empathy','Active Listening','Communication','Guidance Skills'],
        'science'    => ['Analytical Thinking','Attention to Detail','Research Skills','Mathematics'],
        'engineering'=> ['Mathematics','Problem Solving','Attention to Detail','Teamwork'],
        'management' => ['Leadership','Communication','Planning & Scheduling','Teamwork'],
    ];

    public function home()
    {
        return view('career.home');
    }

    public function index()
    {
        return view('career.guidance');
    }

    public function analyse(Request $request)
    {
        $request->validate([
            'full_name'   => 'required|string|max:100',
            'institution' => 'required|string|max:100',
            'field'       => 'required|string|max:100',
            'career'      => 'required|string',
            'resume'      => 'required|file|mimes:pdf,doc,docx|max:5120',
            'academic_doc'=> 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'extra_doc'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $key = Str::uuid()->toString();
        Cache::put('guidance_' . $key, [
            'name'        => $request->full_name,
            'institution' => $request->institution,
            'field'       => $request->field,
            'career'      => $request->career,
        ], now()->addMinutes(30));

        return view('career.loading', ['analysis_key' => $key]);
    }

    public function result(Request $request)
    {
        $request->validate(['analysis_key' => 'required|string']);

        $data = Cache::get('guidance_' . $request->analysis_key);

        if (!$data) {
            return redirect()->route('guidance.index')
                ->withErrors(['Session expired. Please try again.']);
        }

        $career       = $data['career'];
        $requirements = $this->careerRequirements[$career]
            ?? ['Communication','Teamwork','Problem Solving','Attention to Detail'];

        [$met, $missing] = $this->matchSkills($data['field'], $requirements);
        $score  = (int) round((count($met) / count($requirements)) * 100);
        $advice = $this->buildAdvice($data['name'], $career, $data['field'], $missing, $score);

        Cache::forget('guidance_' . $request->analysis_key);

        return view('career.result', [
            'analysis' => [
                'name'        => $data['name'],
                'institution' => $data['institution'],
                'field'       => $data['field'],
                'career'      => $career,
                'score'       => $score,
                'met'         => $met,
                'missing'     => $missing,
                'ai_advice'   => $advice,
            ]
        ]);
    }

    private function matchSkills(string $field, array $requirements): array
    {
        $fieldLower = strtolower($field);
        $affinities = [];

        foreach ($this->fieldAffinities as $keyword => $skills) {
            if (str_contains($fieldLower, $keyword)) {
                $affinities = array_merge($affinities, $skills);
            }
        }

        $baseSkills = ['Communication','Teamwork','Attention to Detail','Problem Solving','Creativity','Empathy'];
        $allMatched = array_unique(array_merge($affinities, $baseSkills));

        $met = $missing = [];
        foreach ($requirements as $req) {
            if (in_array($req, $allMatched)) {
                $met[] = $req;
            } else {
                $missing[] = [
                    'skill' => $req,
                    'tip'   => $this->skillTips[$req] ?? 'Look for free online courses or tutorials to build this skill.',
                ];
            }
        }

        return [$met, $missing];
    }

    private function buildAdvice(string $name, string $career, string $field, array $missing, int $score): string
    {
        $gaps = implode(', ', array_slice(array_column($missing, 'skill'), 0, 3));

        if ($score >= 75) {
            return "Great news, {$name}! Your background in {$field} gives you a strong foundation for a career as a {$career}. You already have the core competencies employers look for.\n\nTo stand out even more, focus on gaining real-world experience through internships, projects, or freelance work. Build a portfolio that showcases your skills tangibly — this matters more than certificates alone.\n\nYou are on the right track. Keep going!";
        }

        if ($score >= 50) {
            return "Good progress, {$name}! Your {$field} background provides a solid base for {$career}, though there are a few key areas to strengthen.\n\nPrioritise closing these gaps: {$gaps}. Many of these can be addressed through free online platforms like Coursera, edX, or YouTube tutorials in just 2–3 months of focused study.\n\nConsider taking on a related part-time project or volunteering to apply your skills practically. Employers value hands-on experience highly.";
        }

        return "Thanks for checking, {$name}! While your {$field} background shows some transferable skills, there are significant gaps to close for a career as a {$career}.\n\nThe most critical areas to develop are: {$gaps}. Don't be discouraged — this just means you have a clear roadmap ahead.\n\nStart with a focused 3–6 month upskilling plan, one skill at a time. Look into HRDC-funded training programmes in Malaysia, or free MOOC platforms like Coursera and edX.";
    }
}
