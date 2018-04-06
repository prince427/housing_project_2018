import nltk
from nltk.corpus import PlaintextCorpusReader
from nltk.corpus import stopwords



stop_words = set(stopwords.words('english'))


# Pre plan
files_pre = ".*\.txt"
corpus_pre = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Pre plan text",
                                files_pre)
corpus2_pre = nltk.Text(corpus_pre.words())
filtered_corpus_pre = [w.lower() for w in corpus2_pre if not w in stop_words]
filtered_corpus2_pre = [word.lower() for word in filtered_corpus_pre if word.isalpha()]
fdistcorpus_pre = nltk.FreqDist(filtered_corpus2_pre)


# Design and planning
files_des = ".*\.txt"
corpus_des = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Design and planning text",
                                files_des)
corpus2_des = nltk.Text(corpus_des.words())
filtered_corpus_des = [w.lower() for w in corpus2_des if not w in stop_words]
filtered_corpus2_des = [word.lower() for word in filtered_corpus_des if word.isalpha()]
fdistcorpus_des = nltk.FreqDist(filtered_corpus2_des)


# Construction
files_con = ".*\.txt"
corpus_con = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Construction text",
                                files_con)
corpus2_con = nltk.Text(corpus_con.words())
filtered_corpus_con = [w.lower() for w in corpus2_con if not w in stop_words]
filtered_corpus2_con = [word.lower() for word in filtered_corpus_con if word.isalpha()]
fdistcorpus_con = nltk.FreqDist(filtered_corpus2_con)


# Post regeneration
files_post = ".*\.txt"
corpus_post = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Post regeneration text",
                                files_post)
corpus2_post = nltk.Text(corpus_post.words())
filtered_corpus_post = [w.lower() for w in corpus2_post if not w in stop_words]
filtered_corpus2_post = [word.lower() for word in filtered_corpus_post if word.isalpha()]
fdistcorpus_post = nltk.FreqDist(filtered_corpus2_post)


print(fdistcorpus_pre.most_common)
print(fdistcorpus_des.most_common)
print(fdistcorpus_con.most_common)
print(fdistcorpus_post.most_common)
