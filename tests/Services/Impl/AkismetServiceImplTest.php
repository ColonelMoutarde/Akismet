<?php


namespace OpenClassrooms\Akismet\Services\Impl;

use OpenClassrooms\Akismet\Client\ClientMock;
use OpenClassrooms\Akismet\Models\CommentStub;
use OpenClassrooms\Akismet\Models\Impl\CommentBuilderImpl;
use OpenClassrooms\Akismet\Services\AkismetService;

/**
 * Class AkismetServiceImplTest
 *
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class AkismetServiceImplTest extends \PHPUnit_Framework_TestCase
{
    const KEY = '123APIKey';
    const BLOG_URL = 'http://www.blogdomainname.com/';

    /**
     * @var AkismetService
     */
    private $akismetService;

    /**
     * @test
     */
    public function commentCheck()
    {
        $commentBuilder = new CommentBuilderImpl();

        $response = $this->akismetService->commentCheck(
            $commentBuilder
                ->create()
                ->withUserIp(CommentStub::USER_IP)
                ->withUserAgent(CommentStub::USER_AGENT)
                ->withAuthorName(CommentStub::AUTHOR_NAME)
                ->withAuthorEmail(CommentStub::AUTHOR_EMAIL)
                ->withContent(CommentStub::CONTENT)
                ->build()
        );

        $this->assertTrue($response);
        $this->assertEquals(AkismetService::RESOURCE, ClientMock::$resource);
    }

    protected function setUp()
    {
        $this->akismetService = new AkismetServiceImpl();
        $this->akismetService->setClient(new ClientMock());
        ClientMock::$postReturn = true;
    }
}
