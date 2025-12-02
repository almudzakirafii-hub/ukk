# 🏀 Garuda Hustler - Brand Color Guide

## Official Brand Colors

### Primary Colors
- **Dark Navy (Primary)**: `#1a1f35` - Main background color
- **Navy (Secondary Dark)**: `#0d1b2a` - Darker background variant

### Secondary Colors (Accent)
- **Gold (Accent 1)**: `#FFD700` - Primary highlight, text accent
- **Orange (Accent 2)**: `#FF8C00` - Secondary highlight, hover states
- **Red (Accent 3)**: `#CC2936` - Danger/Alert color

## Color Usage Guidelines

### Navigation & Headers
- **Background**: Gradient `from-[#0d1b2a] to-[#1a1f35]`
- **Border**: `border-[#FFD700]` or `border-[#FF8C00]`
- **Text**: Primary `text-[#FFD700]`, Secondary `text-[#FF8C00]`
- **Hover**: Change from gold to orange

### Buttons
- **Primary CTA**: Gradient `from-[#FFD700] to-[#FF8C00]` with dark text
- **Secondary**: `bg-[#FF8C00]/10` with `text-[#FFD700]`
- **Borders**: `border-[#FFD700]/40` or `border-[#FF8C00]`

### Backgrounds
- **Main**: `bg-gradient-to-b from-[#0d1b2a] to-[#1a1f35]`
- **Cards**: `bg-[#1a1f35]` with `border-[#FFD700]/40`
- **Hover Cards**: `hover:border-[#FF8C00]` with `shadow-[#FFD700]/20`

### Text
- **Headings**: `text-[#FFD700]`
- **Body**: `text-gray-100` or `text-gray-300`
- **Links**: `text-[#FFD700] hover:text-[#FF8C00]`
- **Subtle**: `text-[#FF8C00]/80`

## CSS Variables (in app.css)

```css
--color-primary-dark: #1a1f35;
--color-primary-navy: #0d1b2a;
--color-secondary-gold: #FFD700;
--color-secondary-orange: #FF8C00;
--color-accent-red: #CC2936;

--color-brand-dark: #1a1f35;
--color-brand-gold: #FFD700;
--color-brand-orange: #FF8C00;
--color-brand-navy: #0d1b2a;
--color-brand-red: #CC2936;
```

## Files Updated

### Core Layout Files
- ✅ `resources/css/app.css` - Added brand color variables
- ✅ `resources/views/layouts/app.blade.php` - Dark gradient background
- ✅ `resources/views/layouts/navbar.blade.php` - Dark background with gold/orange accents
- ✅ `resources/views/layouts/footer.blade.php` - Matching footer styling

### Page Files
- ✅ `resources/views/welcome.blade.php` - Landing page with brand colors
- ✅ `resources/views/home/index.blade.php` - Hero section update

### Pending Updates
- `resources/views/home/team.blade.php`
- `resources/views/home/schedule.blade.php`
- `resources/views/home/gallery.blade.php`
- `resources/views/home/news.blade.php`
- `resources/views/home/news-detail.blade.php`
- `resources/views/admin/**/*.blade.php` - Admin panel pages

## Quick Color Swatches

```
Primary Dark:     ▪ #1a1f35
Secondary Navy:   ▪ #0d1b2a
Gold:             ▪ #FFD700
Orange:           ▪ #FF8C00
Red (Alert):      ▪ #CC2936
```

## Theme Inspiration

**Garuda Hustler** - Named after the Indonesian Golden Eagle (Garuda)
- **Dark Navy**: Represents strength and professionalism
- **Gold**: Represents the eagle's golden wings and prestige
- **Orange**: Represents energy, passion, and basketball dynamism

## Implementation Notes

1. All button CTAs use gold-to-orange gradients
2. Borders on cards use semi-transparent gold: `border-[#FFD700]/40`
3. Hover states transition from gold to orange
4. Shadow effects use gold color with reduced opacity: `shadow-[#FFD700]/20`
5. Navigation uses sticky positioning with gradient overlay
6. Text on dark backgrounds should be high contrast (white, gold, or orange)
