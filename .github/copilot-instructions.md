# Cortex AI - Copilot Instructions

## Project Overview
Cortex AI is a **single-page marketing website** for an AI agents platform. The entire site is self-contained in `index.html` with embedded CSS—no external dependencies, build tools, or JavaScript frameworks.

## Architecture
- **Single-file structure**: All HTML, CSS live in `index.html`
- **No build system**: Direct browser rendering via XAMPP (localhost)
- **No JavaScript**: Currently static; interactive features would need vanilla JS or framework addition

## Design System

### Color Palette
```css
--bg-gradient: linear-gradient(135deg, #0a0f1f, #0f172a)  /* Dark blue background */
--primary: #6366f1                                         /* Indigo accent */
--primary-hover: #4f46e5                                   /* Darker indigo */
--text: #e5e7eb                                            /* Light gray text */
--card-bg: rgba(255,255,255,0.05)                          /* Translucent cards */
--border: rgba(255,255,255,0.08)                           /* Subtle borders */
```

### UI Patterns
- **Cards**: `border-radius: 20px`, translucent backgrounds, hover lift effect (`translateY(-6px)`)
- **Buttons**: Pill-shaped (`border-radius: 30px`), primary has glow shadow
- **Layout**: CSS Grid for agent cards and steps, flexbox for header/hero
- **Responsive**: Single breakpoint at `700px`

### Agent Cards Structure
Each agent follows this pattern in the `#agents` section:
```html
<div class="agent-card">
  <h3>[emoji] Cortex [Name] Agent</h3>
  <p>[Description of capabilities]</p>
</div>
```
Current agents: Assistant, Study, Task, Web

## Development Workflow
1. Edit `index.html` directly
2. View at `http://localhost/Cortex%20AI/` (XAMPP)
3. No compilation or bundling required

## Conventions
- **CSS organization**: Reset → Header → Hero → Sections → Components → Footer → Media queries
- **Naming**: BEM-lite (`.agent-card`, `.hero-buttons`, `.section-desc`)
- **Spacing**: Use `padding` on sections (`80px 60px`), `gap` for grids/flexbox
- **Opacity for hierarchy**: Secondary text uses `opacity: 0.8-0.85`

## When Adding Features
- **New agent**: Add card to `.agents` grid following existing pattern
- **New section**: Follow `<section id="name">` with `h2`, `.section-desc`, then content
- **Interactivity**: Add `<script>` before `</body>`, use vanilla JS or consider adding a framework
- **Images/assets**: Create `/assets/` folder, use relative paths

## Known Limitations
- No form functionality (CTA buttons are visual only)
- No dark/light mode toggle
- Mobile nav not hamburger-ized
