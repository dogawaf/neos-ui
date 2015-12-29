<?php
namespace PackageFactory\Guevara\Domain\Model\Feedback\Operations;

use PackageFactory\Guevara\Domain\Model\FeedbackInterface;
use TYPO3\TYPO3CR\Domain\Model\NodeInterface;

class ReloadDocument implements FeedbackInterface
{
    /**
     * @var NodeInterface
     */
    protected $document;

    /**
     * Set the document
     *
     * @param NodeInterface $document
     * @return void
     */
    public function setDocument(NodeInterface $document)
    {
        $this->document = $document;
    }

    /**
     * Get the document
     *
     * @return NodeInterface
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Get the type identifier
     *
     * @return string
     */
    public function getType()
    {
        return 'PackageFactory.Guevara:ReloadDocument';
    }

    /**
     * Get the description
     *
     * @return string
     */
    public function getDescription()
    {
        return sprintf('Reload of document "%s" required.', $this->getDocument()->getProperty('title'));
    }

    /**
     * Serialize the payload for this feedback
     *
     * @return mixed
     */
    public function serializePayload()
    {
        return [
            'document' => $this->getDocument()->getContextPath()
        ];
    }
}
