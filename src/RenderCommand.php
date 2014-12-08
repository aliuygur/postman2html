<?php namespace Alioygur\Postman2HTML;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RenderCommand extends Command
{
    protected function configure()
    {
        $this->setName('render')
            ->setDescription('convert postman collection to html')
            ->addArgument('file', InputArgument::REQUIRED, 'location of postman collection file')
            ->addOption('output', 'o', InputOption::VALUE_OPTIONAL, 'location of output file', 'output.html');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $collectionFile = new CollectionFile($input->getArgument('file'));

        file_put_contents($input->getOption('output'), $collectionFile->render());

        $filePath = realpath($input->getOption('output'));

        $output->writeln("<info>The output file is created at, {$filePath}</info>");
    }
}