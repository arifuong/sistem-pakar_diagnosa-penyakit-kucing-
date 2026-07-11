# Design System Inspired by International Cat Care

## 1. Visual Theme & Atmosphere

The International Cat Care design system embodies warmth, trust, and expertise through a compassionate yet modern aesthetic. The brand's visual personality balances vibrant energy—particularly through its signature magenta accent—with professional sophistication using serif typography for headings. The system combines playful, rounded forms with generous whitespace to create an approachable, welcoming environment that puts cat welfare at the center. Rich, natural earth tones and teal accents evoke the outdoor habitats and natural behaviors of cats, while the clean neutral palette ensures content remains the focus. This is a design system built for a global charity that values both emotional connection and credible expertise.

**Key Characteristics**
- Bold magenta primary accent (#D71F84) used strategically for calls-to-action and navigation focus
- Serif headings (Noto Serif) paired with humanist sans-serif body text (Poppins) for editorial authority
- Warm, rounded corner treatments and generous padding create a nurturing, non-clinical feel
- High contrast between text and background ensures accessibility and readability
- Nature-inspired supplementary palette (teals, greens, warm oranges) creates visual richness
- Emphasis on photography and illustrated imagery alongside generous whitespace

## 2. Color Palette & Roles

### Primary
- **Brand Magenta** (`#D71F84`): Primary call-to-action buttons, primary navigation active states, hero overlays, links, and brand identity reinforcement. Dominates interactive moments.
- **Brand Purple** (`#6F2282`): Secondary accent for visual hierarchy and alternative accent contexts; used sparingly for depth variation.

### Accent Colors
- **Vibrant Green** (`#A2C63A`): Accent for nature connection, environmental messaging, and highlight elements supporting the animal welfare narrative.
- **Soft Rose** (`#F3A9CB`): Secondary accent for lighter contexts, decorative accents, and softer interactive states.
- **Teal Blue** (`#7BBAC1`): Supporting accent evoking water and natural environments; used for secondary interactive elements.
- **Warm Orange** (`#F3954A`): Tertiary accent for positive highlights, illustrations, and supplementary messaging.
- **Pale Yellow** (`#FFF59B`): Light accent for backgrounds and highlighting without overwhelming; used in layered contexts.
- **Soft Green** (`#C8E6C9`): Very light accent for backgrounds and subtle visual separation.

### Interactive
- **Success** (`#27AE60`): Positive confirmation states, success messages, and completion indicators.
- **Warning** (`#F39C12`): Alert states, caution messaging, and non-critical warnings.
- **Error/Danger** (`#C0392B`): Error states, destructive actions, and critical alerts.

### Neutral Scale
- **Charcoal** (`#333333`): Primary body text, dominant heading color, standard text content on light backgrounds.
- **Dark Gray** (`#555555`): Secondary text for reduced emphasis, helper text, disabled states.
- **Medium Gray** (`#625A5D`): Tertiary text for captions and very subtle content.
- **Light Gray** (`#C8CDD0`): Form field backgrounds, borders, subtle separators.
- **Very Light Gray** (`#EEEEEE`): Secondary backgrounds and soft contrast areas.

### Surface & Borders
- **White** (`#FFFFFF`): Primary background for all surfaces, cards, and content areas. Default card background.
- **Pale Beige** (`#EADAE3`): Soft background variant for subtle section differentiation and card alternatives.
- **Pure Black** (`#000000`): Strong text contrast in specialized contexts; used minimally for maximum visual impact.

## 3. Typography Rules

### Font Family
**Primary (Headings):** Noto Serif with fallback stack `Noto Serif, Georgia, serif`. Used for all heading levels to convey authority and editorial credibility.

**Secondary (Body & UI):** Poppins with fallback stack `Poppins, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif`. Used for body copy, buttons, form labels, and navigation to ensure modern readability.

**Icon Font:** Font Awesome 6 Free for iconography and symbolic elements throughout the interface.

### Hierarchy

| Role | Font | Size | Weight | Line Height | Letter Spacing | Notes |
|------|------|------|--------|-------------|----------------|-------|
| Display/H1 | Noto Serif | 50.4px | 700 | 55.44px | 0px | Hero section headlines and main page titles |
| Heading/H2 | Noto Serif | 39.546px | 700 | 43.5006px | 0px | Section headings and major content divisions |
| Heading/H3 | Noto Serif | 30.42px | 700 | 33.462px | 0px | Subsection headings and card titles |
| Heading/H4 | Noto Serif | 23.4px | 700 | 25.74px | 0px | Minor headings and emphasis text |
| Body Text | Poppins | 18px | 400 | 25.2px | 0px | Standard paragraph and content text |
| List Item | Poppins | 25.2px | 400 | 35.28px | 0px | Bulleted and numbered list items |
| Link | Poppins | 18px | 700 | 25.2px | 0px | Inline hyperlinks and link navigation |
| Button/CTA | Poppins | 28.8px | 600 | 36px | 0px | Primary and secondary button text |
| Form Label | Poppins | 14.4px | 400 | 20.16px | 0px | Form field labels and input descriptions |
| Icon | Font Awesome 6 Free | 28.8px | 900 | 28.8px | 0px | Icon glyphs for navigation and buttons |

### Principles
- **Serif for Authority:** Serif headings convey editorial expertise and trustworthiness appropriate for a charity authority.
- **Sans-Serif for Clarity:** Body text in humanist sans-serif ensures comfortable reading at all sizes.
- **Generous Line Height:** All line heights exceed 1.4× font size for improved readability and accessibility.
- **Hierarchy Through Weight:** Bold (700) and semi-bold (600) weights differentiate heading levels; body remains regular (400) weight for clarity.
- **Semantic Sizing:** Font sizes follow a clear 1.3× progression supporting visual hierarchy without overwhelming variation.

## 4. Component Stylings

### Buttons

**Primary Button (Magenta CTA)**
- Background: `#D71F84`
- Text Color: `#FFFFFF`
- Font: Poppins, 28.8px, weight 600
- Padding: `14.4px`
- Border Radius: `50%` (circular)
- Border: `2px solid #FFFFFF`
- Height: `50px`
- Width: `50px`
- Line Height: `36px`
- Box Shadow: `none`
- Hover State: Background `#A2166B` (darkened magenta), scale `1.05`
- Active State: Background `#8B1163`, scale `0.98`
- Disabled State: Background `#D71F84` at 50% opacity, cursor not-allowed

**Secondary Button (Outline)**
- Background: `transparent`
- Text Color: `#333333`
- Font: Poppins, 25.2px, weight 400
- Padding: `12.6px`
- Border Radius: `0px`
- Border: `2px solid #333333`
- Height: `auto`
- Line Height: `31.5px`
- Box Shadow: `none`
- Hover State: Background `#F3F3F3`, border-color `#D71F84`
- Active State: Background `#E8E8E8`, border-color `#A2166B`

**Ghost Button (Navigation/Minimal)**
- Background: `transparent`
- Text Color: `#333333`
- Font: Poppins, 25.2px, weight 400
- Padding: `12.6px`
- Border Radius: `0px`
- Border: `none`
- Height: `auto`
- Line Height: `31.5px`
- Box Shadow: `none`
- Hover State: Text Color `#D71F84`, background `transparent`
- Active State: Text Color `#8B1163`

### Cards & Containers

**Standard Card**
- Background: `#FFFFFF`
- Border: `1px solid #EEEEEE`
- Border Radius: `0px` (sharp default)
- Padding: `24px`
- Box Shadow: `rgba(0, 0, 0, 0.05) 0px 4.5px 4.5px 0px`
- Hover State: Box Shadow `rgba(0, 0, 0, 0.08) 0px 8px 12px 0px`, translate `0 -2px`

**Rounded Image Container**
- Background: `transparent`
- Border: `3px solid #C8CDD0`
- Border Radius: `36px`
- Padding: `0px`
- Box Shadow: `none`

**Section Container**
- Background: `#FFFFFF` or `#EADAE3` (alternating)
- Padding: `56px 48px` (vertical/horizontal)
- Border Radius: `0px`
- Border: `none`
- Box Shadow: `none`

### Inputs & Forms

**Text Input (Search)**
- Background: `#C8CDD0`
- Text Color: `#333333`
- Font: Poppins, 18px, weight 400
- Padding: `9px 18px`
- Border Radius: `36px 0px 0px 36px` (left rounded)
- Border: `1px solid #C8CDD0`
- Height: `42.5px`
- Width: `385px`
- Line Height: `22.5px`
- Placeholder Color: `#555555` at 60% opacity
- Focus State: Border `2px solid #D71F84`, outline `none`, background `#FFFFFF`

**Form Label**
- Color: `#333333`
- Font: Poppins, 14.4px, weight 400
- Line Height: `20.16px`
- Margin Bottom: `8px`

**Form Input (General)**
- Background: `#FFFFFF`
- Text Color: `#333333`
- Font: Poppins, 18px, weight 400
- Padding: `12px 16px`
- Border Radius: `4px`
- Border: `1px solid #C8CDD0`
- Height: `44px`
- Line Height: `22.5px`
- Focus State: Border `2px solid #D71F84`, box-shadow `0 0 0 3px rgba(215, 31, 132, 0.1)`

### Navigation

**Primary Navigation Menu**
- Background: `#FFFFFF`
- Text Color: `#333333`
- Font: Poppins, 25.2px, weight 400
- Padding: `0px` (items inherit padding)
- Height: `auto`
- Width: `100%`
- Line Height: `35.28px`
- Box Shadow: `none`
- Active Link: Text Color `#D71F84`, border-bottom `3px solid #D71F84`
- Hover State: Text Color `#D71F84`, opacity `1`

**Navigation Link Item**
- Text Color: `#333333`
- Font: Poppins, 25.2px, weight 400
- Padding: `12.6px 20px`
- Line Height: `35.28px`
- Background: `transparent`
- Hover: Text Color `#D71F84`
- Active: Text Color `#D71F84`, underline `3px solid #D71F84`

### Links

**Inline Link (Primary)**
- Color: `#D71F84`
- Font: Poppins, 18px, weight 700
- Text Decoration: `none`
- Line Height: `25.2px`
- Hover State: Text Decoration `underline`, color `#8B1163`
- Active State: Color `#6F2282`
- Visited State: Color `#A2166B`

## 5. Layout Principles

### Spacing System

**Base Unit:** `4px`

**Spacing Scale:**
- `4px` – micro gaps between inline elements
- `8px` – minimal padding/gaps
- `16px` – small content gaps
- `20px` – navigation item spacing
- `24px` – card padding, section dividers
- `28px` – moderate content spacing
- `36px` – section spacing, large gaps
- `44px` – large padding on form elements
- `48px` – hero and section top/bottom padding
- `56px` – large section padding
- `72px` – major section gaps
- `108px` – maximum spacing for hero sections

**Usage Context:**
- `8px–16px`: Form inputs, button internal spacing
- `20px–24px`: Card padding, navigation gaps
- `36px–48px`: Section margins, layout breathing room
- `56px–108px`: Hero sections, full-width spacing

### Grid & Container

**Max Width:** `1200px` (assumed from design patterns)

**Container Padding:** `48px` on sides at desktop, reducing to `24px` on tablet, `16px` on mobile

**Column Strategy:** 12-column implicit grid; major sections use 2–3 column layouts for content + imagery

**Section Patterns:**
- Two-column alternating layout for content + imagery
- Full-width hero with curved bottom edge
- Centered text sections with max-width `960px`
- Card grid at 3 columns desktop, 2 tablet, 1 mobile

### Whitespace Philosophy

The design system embraces generous whitespace as a core principle. Spacing is used intentionally to create visual hierarchy, reduce cognitive load, and highlight content importance. Large margins between sections (48px–108px) encourage breathing room and prevent overwhelming the viewer. Internal padding within cards and containers (24px) provides comfortable content margins. This philosophy mirrors the calm, welfare-focused mission of the brand.

### Border Radius Scale

- `0px` – Sharp corners for card bases, form inputs, navigation items (modern, professional)
- `4px` – Minor rounding for subtle softness
- `7.2px` – Form elements with gentle curves
- `14.4px–18px` – Moderate rounding for decorative buttons
- `28.8px–36px` – Pronounced rounding for pill-shaped inputs and image containers
- `50%` – Circular buttons and fully rounded elements for icons

## 6. Depth & Elevation

| Level | Treatment | Use |
|-------|-----------|-----|
| Base (L0) | No shadow | Flat surfaces: cards on white background, default containers |
| Raised (L1) | `box-shadow: rgba(0, 0, 0, 0.05) 0px 4.5px 4.5px 0px` | Cards at rest, slightly elevated content |
| Elevated (L2) | `box-shadow: rgba(0, 0, 0, 0.05) 0px 36px 36px 0px, rgba(0, 0, 0, 0.05) 0px 4.5px 4.5px 0px` | Dropdown menus, overlays, modals |
| Floating (L3) | `box-shadow: rgba(0, 0, 0, 0.12) 0px 12px 24px 0px` | Tooltips, floating action buttons (custom implementation) |

**Shadow Philosophy:**

Shadows are subtle and restrained, using low-opacity black (`0.05–0.12` alpha) to avoid visual heaviness. The system uses a two-layer shadow approach: a soft distant shadow for depth and a smaller near shadow for definition. This creates dimensional hierarchy without appearing decorative or distracting. Shadows are applied only when interaction or elevation is necessary, maintaining the clean, modern aesthetic of the brand.

## 7. Do's and Don'ts

### Do
- Use **#D71F84 magenta** for all primary call-to-action buttons, "DONATE NOW" and "FIND OUT MORE" patterns
- Pair **Noto Serif headings** with **Poppins body text** to balance authority with modern accessibility
- Apply generous padding (`24px–56px`) around content sections to create breathing room
- Use **#333333 charcoal** for all body text and primary navigation; it ensures excellent contrast and readability
- Implement `border-radius: 36px` on image containers and search inputs for brand consistency
- Maintain sufficient line height (minimum `1.4×` font size) for comfortable reading
- Use rounded corners strategically: sharp (`0px`) for professional form elements, rounded (`36px+`) for nurturing imagery
- Group supplementary accent colors (teal, green, orange) to reinforce nature and wellness narratives
- Test all color combinations against WCAG AA contrast requirements (minimum 4.5:1 for body text)
- Use circular (`50%`) buttons exclusively for primary icons and brand-focused CTAs

### Don't
- Mix serif and sans-serif interchangeably; reserve serif strictly for headings
- Use more than three accent colors in a single page section to avoid visual chaos
- Apply shadows deeper than L2 (`0px 36px 36px 0px`) without explicit design justification
- Use **#555555 dark gray** for body text; reserve it for secondary or disabled states only
- Create border radius combinations outside the established scale (`0px, 4px, 7.2px, 14.4px, 28.8px, 36px, 50%`)
- Reduce padding below `16px` for cards and containers; whitespace is a core brand principle
- Use pure black (`#000000`) for regular text; it creates excessive contrast and visual harshness
- Apply form styling to non-input elements; maintain semantic consistency
- Stack more than two shadow layers; the two-layer system is optimized for the brand
- Forget hover states on interactive elements; all buttons and links require clear interaction feedback

## 8. Responsive Behavior

### Breakpoints

| Breakpoint Name | Width | Key Changes |
|-----------------|-------|-------------|
| Mobile | 320px–639px | Single column, 16px padding, 25.2px navigation font, 18px body text, circular buttons remain 50px |
| Tablet | 640px–1023px | Two columns, 24px padding, 25.2px navigation font, stacked navigation menu, search input 250px width |
| Desktop | 1024px–1439px | Three columns, 48px padding, full horizontal navigation, search input 385px, max container 1200px |
| Large Desktop | 1440px+ | Max-width container 1200px centered, 56px padding, unchanged typography |

### Touch Targets
- Minimum touch target size: `48px × 48px` (iOS/Android guidance)
- Primary buttons: `50px × 50px` (circular) meets or exceeds minimum
- Form inputs: minimum `44px` height for comfortable touch interaction
- Navigation links: minimum `44px` height with `12.6px` padding
- Icon buttons: `40px × 40px` minimum
- Spacing between touch targets: minimum `8px` to prevent accidental interaction

### Collapsing Strategy
- **Mobile:** Full-width single-column layout; hamburger menu for navigation; search input width `calc(100% - 50px)` to accommodate search button
- **Tablet:** Two-column layouts for content + imagery; navigation collapses to dropdown or hamburger menu; section padding reduces to `24px`
- **Desktop:** Full three-column grid systems; horizontal navigation visible; section padding returns to `48px–56px`
- **Image Strategy:** Hero images scale proportionally; container images remain `border-radius: 36px` at all sizes; aspect ratios locked at 16:9 or 4:3
- **Typography:** Font sizes remain constant across breakpoints; line heights scale proportionally; button text maintains `28.8px` or reduces to `25.2px` on mobile only

## 9. Agent Prompt Guide

### Quick Color Reference
- **Primary CTA:** Brand Magenta (`#D71F84`) – all "DONATE NOW," primary buttons, active navigation
- **Background:** White (`#FFFFFF`) default; Pale Beige (`#EADAE3`) for alternating sections
- **Heading Text:** Charcoal (`#333333`) with Noto Serif 700 weight
- **Body Text:** Charcoal (`#333333`) with Poppins 400 weight
- **Navigation Links:** Charcoal (`#333333`); active/hover state `#D71F84`
- **Secondary Accent:** Purple (`#6F2282`), Teal (`#7BBAC1`), Green (`#A2C63A`) for supporting elements
- **Status: Success:** `#27AE60`; **Status: Warning:** `#F39C12`; **Status: Error:** `#C0392B`
- **Form Backgrounds:** Light Gray (`#C8CDD0`)
- **Borders & Dividers:** Light Gray (`#C8CDD0`) or Very Light Gray (`#EEEEEE`)

### Iteration Guide

1. **Always use `#D71F84` for primary actions** – donation buttons, main CTAs, active navigation states must use brand magenta for consistency and conversion focus.

2. **Serif headings paired with sans-serif body** – All heading levels (H1–H4) use Noto Serif 700; body copy, labels, and buttons use Poppins at appropriate weights (400 for body, 600 for buttons, 700 for links).

3. **Maintain 1.4× minimum line height** – All typography must have line-height ≥ 1.4× font size; this is non-negotiable for accessibility and readability.

4. **Apply consistent padding scale** – Use only values from the spacing scale (`4px, 8px, 16px, 20px, 24px, 28px, 36px, 44px, 48px, 56px, 72px, 108px`); default card padding is `24px`, section padding is `48px–56px`.

5. **Border radius follows exact scale** – Use only `0px` (sharp), `4px` (minor), `7.2px` (form), `14.4px–18px` (moderate), `28.8px–36px` (pronounced), or `50%` (circular); do not introduce intermediate values.

6. **Buttons have explicit hover/active/disabled states** – Every interactive element must include CSS for `:hover`, `:active`, and `:disabled` pseudo-classes; hover typically darkens background or adds underline.

7. **Shadow system: two-layer approach** – Use either no shadow (L0), single small shadow (L1: `0px 4.5px 4.5px`), or dual-layer shadow (L2: `36px 36px + 4.5px 4.5px`); do not create custom shadow combinations.

8. **Circular buttons exclusive to primary CTAs** – Only use `border-radius: 50%` on primary action buttons and brand icons; form inputs and navigation use `36px` or `0px` radius.

9. **Color contrast testing mandatory** – All text-to-background combinations must meet WCAG AA minimum (4.5:1 for body, 3:1 for large text); test magenta text on light backgrounds.

10. **Responsive: mobile-first typography unchanged** – Font sizes remain constant from mobile to desktop; only padding and layout columns adjust; exception: form labels reduce to `12.8px` on mobile only if space-constrained.