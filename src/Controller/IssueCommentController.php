<?php

namespace App\Controller;

use App\Entity\Issue;
use App\Entity\IssueComment;
use App\Form\IssueCommentType;
use App\Repository\IssueCommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/issue/comment")
 */
class IssueCommentController extends AbstractController
{
    /**
     * @Route("/", name="issue_comment_index", methods={"GET"})
     */
    public function index(IssueCommentRepository $issueCommentRepository): Response
    {
        return $this->render('issue_comment/index.html.twig', [
            'issue_comments' => $issueCommentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="issue_comment_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $issueComment = new IssueComment();
        $issueComment->setContent($request->request->get('content'));
        $issueComment->setUpdatedAt(new \DateTimeImmutable());
        $issueComment->setIssue($this->getDoctrine()->getRepository(Issue::class)->find($request->request->get('issue')));
        $entityManager->persist($issueComment);
        $entityManager->flush();

        return $this->json('ok');
    }

    /**
     * @Route("/{id}", name="issue_comment_show", methods={"GET"})
     */
    public function show(IssueComment $issueComment): Response
    {
        return $this->render('issue_comment/show.html.twig', [
            'issue_comment' => $issueComment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="issue_comment_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, IssueComment $issueComment, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(IssueCommentType::class, $issueComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('issue_comment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('issue_comment/edit.html.twig', [
            'issue_comment' => $issueComment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="issue_comment_delete", methods={"POST"})
     */
    public function delete(Request $request, IssueComment $issueComment, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$issueComment->getId(), $request->request->get('_token'))) {
            $entityManager->remove($issueComment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('issue_comment_index', [], Response::HTTP_SEE_OTHER);
    }
}
