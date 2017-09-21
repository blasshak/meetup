<?php

namespace MeetupBundle\Application\DataTransformer;

use MeetupBundle\Infrastructure\Service\FormatConverter\FormatConverterInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ExceptionDataTransformer
 * @package MeetupBundle\Application\DataTransformer
 */
class ExceptionDataTransformer implements DataTransformerInterface
{
    /**
     * @access private
     * @var FormatConverterInterface
     */
    private $formatConverter;

    /**
     * @access private
     * @var string
     */
    private $message;

    /**
     * @access public
     * @param FormatConverterInterface $formatConverter
     * @param string $message
     */
    public function __construct(FormatConverterInterface $formatConverter, $message)
    {
        $this->formatConverter = $formatConverter;
        $this->message = $message;
    }

    /**
     * @access public
     * @return mixed
     */
    public function transform()
    {
        $data = array(
            'code' => JsonResponse::HTTP_BAD_REQUEST,
            'status' => 'error',
            'message' => $this->message
        );

        return $this->formatConverter->convert($data);
    }
}
