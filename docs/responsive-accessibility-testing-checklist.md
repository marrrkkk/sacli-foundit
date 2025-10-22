# Responsive Design & Accessibility Testing Checklist

## Testing Date: ******\_\_\_******

## Tester: ******\_\_\_******

---

## 1. Responsive Design Testing

### Mobile Testing (320px - 639px)

#### Navigation

-   [ ] Hamburger menu appears and functions correctly
-   [ ] Logo is visible and properly sized
-   [ ] Mobile menu opens/closes smoothly
-   [ ] All navigation links are accessible
-   [ ] Touch targets are at least 44x44px
-   [ ] No horizontal scrolling occurs

#### Content

-   [ ] Text is readable without zooming
-   [ ] Images scale appropriately
-   [ ] Cards stack vertically
-   [ ] Buttons are full-width or appropriately sized
-   [ ] Forms are usable without horizontal scrolling
-   [ ] Icons are appropriately sized (not too small)

#### Components

-   [ ] Search bar is full-width and functional
-   [ ] Modals display correctly (full-screen or near full-screen)
-   [ ] Status badges are readable
-   [ ] Item cards display properly
-   [ ] Rounded corners render correctly

### Tablet Testing (640px - 1023px)

#### Navigation

-   [ ] Navigation transitions properly from mobile to desktop
-   [ ] All navigation items are visible
-   [ ] Spacing is appropriate
-   [ ] Logo and branding are properly displayed

#### Content

-   [ ] Grid layouts adjust appropriately (2-column where applicable)
-   [ ] Images maintain aspect ratio
-   [ ] Text remains readable
-   [ ] Cards have appropriate spacing
-   [ ] Forms utilize available space effectively

#### Components

-   [ ] Search bar has appropriate width
-   [ ] Modals are centered and properly sized
-   [ ] Buttons have appropriate sizing
-   [ ] Icons scale appropriately
-   [ ] Rounded corners render correctly

### Desktop Testing (1024px+)

#### Navigation

-   [ ] Full navigation menu is displayed
-   [ ] All navigation items are visible
-   [ ] Dropdowns function correctly
-   [ ] Hover states work properly
-   [ ] Logo and branding are prominent

#### Content

-   [ ] Content is centered with max-width constraint
-   [ ] Grid layouts display multiple columns (3-4 where applicable)
-   [ ] Images are high quality and properly sized
-   [ ] Text has appropriate line length
-   [ ] Cards display in grid format

#### Components

-   [ ] Search bar has appropriate width (not too wide)
-   [ ] Modals are centered and appropriately sized
-   [ ] Buttons have consistent sizing
-   [ ] Icons are crisp and clear
-   [ ] Rounded corners render correctly
-   [ ] Hover effects work smoothly

### Orientation Testing

-   [ ] Portrait orientation works correctly on mobile
-   [ ] Landscape orientation works correctly on mobile
-   [ ] Portrait orientation works correctly on tablet
-   [ ] Landscape orientation works correctly on tablet

### Browser Testing

-   [ ] Chrome (latest)
-   [ ] Firefox (latest)
-   [ ] Safari (latest)
-   [ ] Edge (latest)
-   [ ] Mobile Safari (iOS)
-   [ ] Chrome Mobile (Android)

---

## 2. Icon Size Verification

### Icon Sizes at Different Breakpoints

#### Mobile (320px - 639px)

-   [ ] xs icons (12px) are visible and clear
-   [ ] sm icons (16px) are visible and clear
-   [ ] md icons (20px) are visible and clear
-   [ ] lg icons (24px) are visible and clear
-   [ ] xl icons (32px) are visible and clear
-   [ ] Icons in buttons are appropriately sized
-   [ ] Icons in navigation are appropriately sized
-   [ ] Icons in cards are appropriately sized

#### Tablet (640px - 1023px)

-   [ ] All icon sizes render correctly
-   [ ] Icons maintain proper spacing with text
-   [ ] Icons in touch targets are large enough

#### Desktop (1024px+)

-   [ ] All icon sizes render correctly
-   [ ] Icons are crisp and clear
-   [ ] Icons maintain proper proportions

### Icon Accessibility

-   [ ] Decorative icons have aria-hidden="true"
-   [ ] Meaningful icons have aria-label
-   [ ] Icon-only buttons have descriptive labels
-   [ ] Icons don't interfere with text readability

---

## 3. Rounded Corners Verification

### Components to Check

-   [ ] Buttons (rounded-lg - 12px)
-   [ ] Input fields (rounded-md - 10px)
-   [ ] Item cards (rounded-xl - 16px)
-   [ ] Stat cards (rounded-xl - 16px)
-   [ ] Modals (rounded-2xl - 20px)
-   [ ] Status badges (rounded-full)
-   [ ] Search bar (rounded-xl - 16px)
-   [ ] Dropdowns (rounded-lg - 12px)
-   [ ] Images (rounded-lg - 12px)
-   [ ] Navigation items (rounded-t-lg - top only)

### Cross-Device Verification

-   [ ] Rounded corners render correctly on iOS
-   [ ] Rounded corners render correctly on Android
-   [ ] Rounded corners render correctly on Windows
-   [ ] Rounded corners render correctly on macOS
-   [ ] No pixelation or rendering issues

---

## 4. Color Contrast Ratios

### Text Contrast (WCAG 2.1 AA: 4.5:1 for normal text, 3:1 for large text)

#### Primary Elements

-   [ ] Primary button text on green background (5.24:1) ✓
-   [ ] Secondary button text (5.24:1) ✓
-   [ ] Body text on white background (7.0:1) ✓
-   [ ] Headings on white background (16.1:1) ✓
-   [ ] Link text (meets minimum contrast)

#### Status Badges

-   [ ] Verified badge text (7.8:1) ✓
-   [ ] Pending badge text (8.2:1) ✓
-   [ ] Rejected badge text (7.5:1) ✓
-   [ ] Resolved badge text (meets minimum contrast)

#### Form Elements

-   [ ] Input labels (meets minimum contrast)
-   [ ] Input placeholder text (meets minimum contrast)
-   [ ] Error messages (meets minimum contrast)
-   [ ] Success messages (meets minimum contrast)

#### Navigation

-   [ ] Navigation link text (meets minimum contrast)
-   [ ] Active navigation link text (meets minimum contrast)
-   [ ] Dropdown text (meets minimum contrast)

### Focus Indicators

-   [ ] Focus rings are visible (2px minimum)
-   [ ] Focus rings have sufficient contrast (3:1 minimum)
-   [ ] Focus rings don't obscure content

### Automated Testing

-   [ ] Run axe DevTools scan
-   [ ] Run WAVE evaluation
-   [ ] Run Lighthouse accessibility audit
-   [ ] Address any contrast issues found

---

## 5. Keyboard Navigation Testing

### Basic Navigation

-   [ ] Tab key moves focus forward through interactive elements
-   [ ] Shift+Tab moves focus backward
-   [ ] Focus order is logical and intuitive
-   [ ] Focus is visible at all times
-   [ ] No keyboard traps exist

### Skip Navigation

-   [ ] Skip link appears on first Tab press
-   [ ] Skip link is clearly visible when focused
-   [ ] Skip link jumps to main content when activated
-   [ ] Skip link has proper styling and contrast

### Navigation Menu

-   [ ] All navigation links are keyboard accessible
-   [ ] Dropdowns open with Enter/Space
-   [ ] Dropdowns close with Escape
-   [ ] Arrow keys navigate dropdown items (if applicable)
-   [ ] Mobile menu toggle is keyboard accessible

### Forms

-   [ ] All form fields are keyboard accessible
-   [ ] Tab order through form is logical
-   [ ] Radio buttons navigate with arrow keys
-   [ ] Checkboxes toggle with Space
-   [ ] Select dropdowns open with Enter/Space
-   [ ] Form submission works with Enter key

### Buttons and Links

-   [ ] All buttons activate with Enter or Space
-   [ ] All links activate with Enter
-   [ ] Button focus states are clearly visible
-   [ ] Link focus states are clearly visible

### Modals

-   [ ] Modal opens with keyboard
-   [ ] Focus moves to modal when opened
-   [ ] Tab cycles through modal elements only (focus trap)
-   [ ] Escape key closes modal
-   [ ] Focus returns to trigger element when closed
-   [ ] Close button is keyboard accessible

### Search and Filters

-   [ ] Search input is keyboard accessible
-   [ ] Search submission works with Enter
-   [ ] Clear button is keyboard accessible
-   [ ] Filter toggles are keyboard accessible
-   [ ] Filter options are keyboard accessible

---

## 6. Screen Reader Compatibility

### Screen Reader Testing Tools

-   [ ] NVDA (Windows) - Free
-   [ ] JAWS (Windows) - Trial available
-   [ ] VoiceOver (macOS/iOS) - Built-in
-   [ ] TalkBack (Android) - Built-in

### Semantic HTML

-   [ ] Proper heading hierarchy (h1 → h2 → h3)
-   [ ] Navigation uses <nav> element
-   [ ] Main content uses <main> element
-   [ ] Lists use <ul>/<ol> elements
-   [ ] Buttons use <button> element
-   [ ] Links use <a> element

### ARIA Labels and Attributes

#### Navigation

-   [ ] Nav element has role="navigation"
-   [ ] Nav element has descriptive aria-label
-   [ ] Hamburger button has aria-expanded
-   [ ] Hamburger button has aria-controls
-   [ ] Hamburger button has aria-label
-   [ ] Mobile menu has proper ID for aria-controls

#### Icons

-   [ ] Decorative icons have aria-hidden="true"
-   [ ] Meaningful standalone icons have aria-label
-   [ ] Icon-only buttons have descriptive aria-label
-   [ ] Icons with adjacent text are marked decorative

#### Forms

-   [ ] All inputs have associated <label> elements
-   [ ] Labels are properly associated (for/id)
-   [ ] Required fields are marked (required attribute or aria-required)
-   [ ] Error messages are associated with inputs (aria-describedby)
-   [ ] Field instructions are associated with inputs

#### Buttons

-   [ ] All buttons have descriptive text or aria-label
-   [ ] Icon-only buttons have aria-label
-   [ ] Toggle buttons have aria-pressed (if applicable)
-   [ ] Disabled buttons have disabled attribute

#### Modals

-   [ ] Modal has role="dialog"
-   [ ] Modal has aria-labelledby pointing to title
-   [ ] Modal has aria-describedby pointing to description (if applicable)
-   [ ] Modal close button has descriptive label

#### Status Messages

-   [ ] Success messages use appropriate role (status/alert)
-   [ ] Error messages use appropriate role (alert)
-   [ ] Loading states use aria-live regions
-   [ ] Dynamic content updates are announced

### Image Alternative Text

-   [ ] All images have alt attributes
-   [ ] Decorative images have empty alt (alt="")
-   [ ] Informative images have descriptive alt text
-   [ ] Complex images have detailed descriptions
-   [ ] Icons used as images have appropriate alt text

### Screen Reader Announcements

-   [ ] Page title is descriptive and unique
-   [ ] Headings are announced correctly
-   [ ] Links are announced with context
-   [ ] Buttons are announced with purpose
-   [ ] Form fields are announced with labels
-   [ ] Error messages are announced
-   [ ] Success messages are announced
-   [ ] Loading states are announced
-   [ ] Modal opening/closing is announced

### Navigation with Screen Reader

-   [ ] Can navigate by headings
-   [ ] Can navigate by landmarks
-   [ ] Can navigate by links
-   [ ] Can navigate by form fields
-   [ ] Can navigate by buttons
-   [ ] Skip link is announced and functional

---

## 7. Additional Accessibility Checks

### Zoom and Text Scaling

-   [ ] Page works at 200% zoom
-   [ ] Page works at 400% zoom (WCAG AAA)
-   [ ] Text remains readable when scaled
-   [ ] No content is cut off when zoomed
-   [ ] Horizontal scrolling is minimal

### Motion and Animation

-   [ ] Animations are smooth and not jarring
-   [ ] Animations don't cause discomfort
-   [ ] Consider adding prefers-reduced-motion support
-   [ ] Animations can be paused if necessary

### Touch Targets

-   [ ] All touch targets are at least 44x44px
-   [ ] Touch targets have adequate spacing (8px minimum)
-   [ ] Buttons are easy to tap on mobile
-   [ ] Links are easy to tap on mobile

### Error Handling

-   [ ] Error messages are clear and descriptive
-   [ ] Error messages are associated with fields
-   [ ] Error states are visually distinct
-   [ ] Error icons are used appropriately
-   [ ] Success states are clearly indicated

### Forms

-   [ ] Form labels are always visible
-   [ ] Placeholder text is not used as labels
-   [ ] Required fields are clearly marked
-   [ ] Field instructions are clear
-   [ ] Error messages are specific and helpful

---

## 8. Automated Testing Results

### axe DevTools

-   **Date Tested**: ******\_\_\_******
-   **Issues Found**: ******\_\_\_******
-   **Critical Issues**: ******\_\_\_******
-   **Serious Issues**: ******\_\_\_******
-   **Moderate Issues**: ******\_\_\_******
-   **Minor Issues**: ******\_\_\_******
-   **All Issues Resolved**: [ ]

### WAVE

-   **Date Tested**: ******\_\_\_******
-   **Errors**: ******\_\_\_******
-   **Contrast Errors**: ******\_\_\_******
-   **Alerts**: ******\_\_\_******
-   **All Issues Resolved**: [ ]

### Lighthouse

-   **Date Tested**: ******\_\_\_******
-   **Accessibility Score**: ******\_\_\_******/100
-   **Performance Score**: ******\_\_\_******/100
-   **Best Practices Score**: ******\_\_\_******/100
-   **SEO Score**: ******\_\_\_******/100
-   **Target Score**: 90+ for all categories

---

## 9. Issues Found and Resolutions

### Issue 1

-   **Description**: ******\_\_\_******
-   **Severity**: [ ] Critical [ ] High [ ] Medium [ ] Low
-   **Resolution**: ******\_\_\_******
-   **Status**: [ ] Open [ ] In Progress [ ] Resolved

### Issue 2

-   **Description**: ******\_\_\_******
-   **Severity**: [ ] Critical [ ] High [ ] Medium [ ] Low
-   **Resolution**: ******\_\_\_******
-   **Status**: [ ] Open [ ] In Progress [ ] Resolved

### Issue 3

-   **Description**: ******\_\_\_******
-   **Severity**: [ ] Critical [ ] High [ ] Medium [ ] Low
-   **Resolution**: ******\_\_\_******
-   **Status**: [ ] Open [ ] In Progress [ ] Resolved

---

## 10. Sign-Off

### Responsive Design

-   **Tested By**: ******\_\_\_******
-   **Date**: ******\_\_\_******
-   **Status**: [ ] Pass [ ] Fail [ ] Pass with Minor Issues
-   **Notes**: ******\_\_\_******

### Accessibility

-   **Tested By**: ******\_\_\_******
-   **Date**: ******\_\_\_******
-   **Status**: [ ] Pass [ ] Fail [ ] Pass with Minor Issues
-   **Notes**: ******\_\_\_******

### Final Approval

-   **Approved By**: ******\_\_\_******
-   **Date**: ******\_\_\_******
-   **Signature**: ******\_\_\_******

---

## Notes and Recommendations

---

---

---

---

---
