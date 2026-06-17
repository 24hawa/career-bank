@extends('layouts.candidate')
@section('title', 'My Profile')

@section('content')
<div class="page" style="max-width: 1100px; margin: 0 auto; padding: 24px 16px;">

    {{-- HERO TOP HEADER CARD --}}
    <div class="card" style="padding: 32px; background: #0B1A0E; border: 1px solid rgba(200, 155, 0, 0.2); margin-bottom: 24px; position: relative; overflow: hidden; border-radius: 16px;">
        <div style="position: absolute; right: -20px; top: -20px; font-size: 140px; color: rgba(200,155,0,0.03); font-weight: 800; pointer-events: none;">
            UPSI
        </div>
        
        <div style="display: flex; align-items: center; gap: 24px; flex-wrap: wrap;">
            {{-- Profile Avatar/Initials Circle --}}
            <div style="width: 80px; height: 80px; border-radius: 50%; background: #0083A0; display: flex; align-items: center; justify-content: center; font-size: 28px; font-weight: 700; color: #0B1A0E; border: 3px solid rgba(255,255,255,0.1);">
                SU
            </div>
            
            <div style="flex: 1;">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 4px;">
                    <h1 style="font-size: 24px; font-weight: 600; color: #ffffff; margin: 0;">Shafiena Binti Usri</h1>
                    <span style="background: rgba(0,163,196,0.15); color: #0083A0; font-size: 11px; padding: 3px 8px; border-radius: 6px; font-weight: 600; border: 1px solid rgba(200,155,0,0.2);">Verified Student</span>
                </div>
                <p style="font-size: 14px; color: rgba(255,255,255,0.7); margin-bottom: 12px;">Aspiring Software Engineer specialized in robust web architectures and structured database pipelines.</p>
                
                <div style="display: flex; gap: 20px; flex-wrap: wrap; font-size: 13px; color: rgba(255,255,255,0.5);">
                    <span style="display: flex; align-items: center; gap: 6px;"><i class="ti ti-mail" style="color: #0083A0;"></i> shafiena@university.edu.my</span>
                    <span style="display: flex; align-items: center; gap: 6px;"><i class="ti ti-map-pin" style="color: #0083A0;"></i> Tanjong Malim, Perak</span>
                </div>
            </div>
        </div>
    </div>

    {{-- GRID STRUCTURE --}}
    <div style="display: grid; grid-template-columns: 1fr 1.8fr; gap: 24px; align-items: flex-start;">
        
        {{-- LEFT COLUMN: ACADEMICS & ANALYTICS --}}
        <div style="display: flex; flex-direction: column; gap: 24px;">
            
            {{-- Academic Profile Card --}}
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 15px; font-weight: 600; color: var(--text); margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                    <i class="ti ti-school" style="color: #0083A0;"></i> Academic Standings
                </h3>
                
                <div style="margin-bottom: 14px;">
                    <div style="font-size: 11px; color: var(--muted); text-transform: uppercase;">Institution</div>
                    <div style="font-size: 14px; font-weight: 500; color: var(--text);">Universiti Pendidikan Sultan Idris</div>
                </div>
                
                <div style="margin-bottom: 14px;">
                    <div style="font-size: 11px; color: var(--muted); text-transform: uppercase;">Major Discipline</div>
                    <div style="font-size: 14px; font-weight: 500; color: var(--text);">Bachelor of Software Engineering (Honours)</div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--border);">
                    <div>
                        <div style="font-size: 11px; color: var(--muted); text-transform: uppercase;">Current CGPA</div>
                        <div style="font-size: 18px; font-weight: 700; color: #0083A0;">3.85 / 4.00</div>
                    </div>
                    <div>
                        <div style="font-size: 11px; color: var(--muted); text-transform: uppercase;">Graduation</div>
                        <div style="font-size: 14px; font-weight: 500; color: var(--text); margin-top: 3px;">Expected 2027</div>
                    </div>
                </div>
            </div>

            {{-- Metric Quick Vault --}}
            <div class="card" style="padding: 20px; background: var(--input-bg);">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px;">
                    <span style="font-size: 13px; color: var(--muted);">Profile Completeness</span>
                    <span style="font-size: 13px; font-weight: 600; color: var(--text);">85%</span>
                </div>
                <div style="width: 100%; height: 6px; background: var(--border); border-radius: 3px; overflow: hidden;">
                    <div style="width: 85%; height: 100%; background: #0083A0; border-radius: 3px;"></div>
                </div>
            </div>

        </div>

        {{-- RIGHT COLUMN: SKILLS, PORTFOLIO & BIO ENGINE --}}
        <div style="display: flex; flex-direction: column; gap: 24px;">
            
            {{-- Professional Bio Info --}}
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 15px; font-weight: 600; color: var(--text); margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
                    <i class="ti ti-notes" style="color: #0083A0;"></i> Professional Summary
                </h3>
                <p style="font-size: 14px; color: var(--muted); line-height: 1.6; margin: 0;">
                    Highly motivated computer science undergraduate focused on writing clean, elegant, and maintainable software code. Experienced with relational database optimizations and full-stack MVC architectures. Constantly tracking and resolving practical software architecture challenges.
                </p>
            </div>

            {{-- Tech Competencies / Tag Inventory --}}
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 15px; font-weight: 600; color: var(--text); margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                    <i class="ti ti-cpu" style="color: #0083A0;"></i> Verified Skill Vault
                </h3>
                
                <div style="margin-bottom: 16px;">
                    <div style="font-size: 12px; color: var(--text); font-weight: 500; margin-bottom: 8px;">Core Frameworks & Programming</div>
                    <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                        @foreach(['Laravel', 'PHP', 'JavaScript', 'MySQL', 'HTML5 & CSS3'] as $skill)
                            <span style="background: var(--input-bg); border: 1px solid var(--border); color: var(--text); font-size: 12px; padding: 5px 12px; border-radius: 6px;">
                                {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <div>
                    <div style="font-size: 12px; color: var(--text); font-weight: 500; margin-bottom: 8px;">Methodologies & Toolsets</div>
                    <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                        @foreach(['Git / GitHub', 'UI/UX Rapid Prototyping', 'Agile Workflows', 'RESTful API Testing'] as $tool)
                            <span style="background: var(--input-bg); border: 1px solid var(--border); color: var(--muted); font-size: 12px; padding: 5px 12px; border-radius: 6px;">
                                {{ $tool }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Static Call to Edit Action --}}
            <div style="display: flex; justify-content: flex-end;">
                <button class="btn btn-primary" onclick="alert('Profile changes saved to database vault successfully!')" style="padding: 10px 20px;">
                    <i class="ti ti-edit"></i> Edit Profile Fields
                </button>
            </div>

        </div>

    </div>
</div>
@endsection