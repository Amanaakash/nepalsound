<?php

namespace Tests\Unit;

use App\Support\SitePresentation;
use PHPUnit\Framework\TestCase;

class SitePresentationTest extends TestCase
{
    private string $projectRoot;

    protected function setUp(): void
    {
        parent::setUp();

        $this->projectRoot = dirname(__DIR__, 2);
    }

    public function test_local_absolute_menu_urls_follow_the_current_application_origin(): void
    {
        $this->assertSame('/rentals', SitePresentation::menuPath('http://127.0.0.1:8000/rentals'));
        $this->assertSame('/about-us?from=nav#team', SitePresentation::menuPath('http://localhost:8000/about-us?from=nav#team'));
        $this->assertSame('/', SitePresentation::menuPath('http://127.0.0.1:8000/'));
    }

    public function test_external_and_already_relative_menu_urls_are_preserved(): void
    {
        $this->assertSame('https://example.com/rentals', SitePresentation::menuPath('https://example.com/rentals'));
        $this->assertSame('/category/1', SitePresentation::menuPath('/category/1'));
    }

    public function test_missing_logo_uses_the_bundled_namaste_logo(): void
    {
        $this->assertSame(
            'assets/site/image/LOGO.jpg',
            SitePresentation::logoPath('/upload_file/setting/missing-logo.jpg', [$this->projectRoot])
        );
    }

    public function test_existing_uploaded_image_is_not_replaced(): void
    {
        $this->assertSame(
            'assets/site/image/blog2.jpg',
            SitePresentation::imagePath('/assets/site/image/blog2.jpg', 'assets/site/image/blog1.webp', [$this->projectRoot])
        );
    }

    public function test_missing_upload_is_recovered_from_an_asset_with_the_same_original_filename(): void
    {
        $this->assertSame(
            'assets/site/image/blog4.jpg',
            SitePresentation::imagePath(
                '/upload_file/banner/1727021406_1725432880_blog4.jpg',
                'assets/site/image/blog1.webp',
                [$this->projectRoot]
            )
        );
    }

    public function test_missing_frontend_upload_request_resolves_to_a_real_bundled_asset(): void
    {
        $this->assertSame(
            'assets/site/image/RCF-Logo.png',
            SitePresentation::uploadPath(
                'rental/1727267571_363997422_RCF-Logo.png',
                [$this->projectRoot]
            )
        );

        $this->assertSame(
            'assets/site/image/blog1.webp',
            SitePresentation::uploadPath(
                'blogcategory/1727168431_1276809240_W2.JPG',
                [$this->projectRoot]
            )
        );
    }

    public function test_missing_service_images_use_the_bundled_service_gallery(): void
    {
        $this->assertSame(
            'assets/site/image/services0.jpg',
            SitePresentation::servicePath('/upload_file/services/missing.JPG', 0, [$this->projectRoot])
        );
        $this->assertSame(
            'assets/site/image/sercices3.png',
            SitePresentation::servicePath('/upload_file/services/missing.JPG', 3, [$this->projectRoot])
        );
    }

    public function test_missing_blog_images_are_mapped_to_the_matching_bundled_assets(): void
    {
        $this->assertSame(
            'assets/site/image/blog1.webp',
            SitePresentation::blogPath(
                '/upload_file/blog/missing-sound-solutions.gif',
                'Sound Solutions for Every Occasion Exploring Namaste Sound’s Services',
                0,
                [$this->projectRoot]
            )
        );

        $this->assertSame(
            'assets/site/image/Namaste-Sound-On-the-top-of-Mount-Everest.jpg',
            SitePresentation::blogPath(
                '/upload_file/blog/missing-everest.JPG',
                'Namaste Sound At the summit of Everest',
                1,
                [$this->projectRoot]
            )
        );

        $this->assertSame(
            'assets/site/image/blog3.jpg',
            SitePresentation::blogPath(
                '/upload_file/blog/missing-generic.jpg',
                'विद्यार्थी नआएपछि भर्ना रोकियो',
                2,
                [$this->projectRoot]
            )
        );
    }
}
