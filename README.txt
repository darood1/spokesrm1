SPOKES RISK MANAGEMENT — WEBSITE PACKAGE

Upload the CONTENTS of this folder to your web hosting document root (usually public_html).
Home URL is /; all internal links use /about/, /services/, etc., with no .html suffix.
Each page is stored as a directory index.html. Hosting must support directory index pages.

IMPORTANT — CONTACT FORM
The form submits directly to /send-enquiry.php, which sends to info@spokesrm.co.uk without opening a visitor email client. This is server-side functionality and WILL NOT work on GitHub Pages or other static-only hosting. Use a PHP-enabled host (e.g. a standard PHP hosting plan). The host must provide configured outgoing mail for PHP mail(); otherwise configure SMTP with a supported mailer on the server. Set up SPF/DKIM and test an enquiry end to end before publishing. PHP mail() returning true does not guarantee inbox delivery. Do not publish as a working form until tested. For production, add rate limiting, CAPTCHA and server-side logging; review the privacy notice.

BRANDING AND IMAGES
images/logo.svg is a clean text-only SPOKES logo (no subtitle beneath it). Replace with your approved logo if preferred. images/ai-design-concept.png is an AI-generated design reference, not a site page or photograph. The site currently uses remote Unsplash illustrative photographs in CSS/HTML; they are not SPOKES personnel or properties. For fully self-hosted images, place appropriately licensed images in images/ and replace their URLs in the HTML and CSS. Never represent illustrative imagery as actual company staff or sites.

The two supplied competitor website ZIPs were reviewed as broad structural references only; their proprietary code, trademarks and image assets were not copied.

Before publishing: confirm company identity, accuracy of service claims, privacy policy, operational capacity, hosting and mail deliverability.
